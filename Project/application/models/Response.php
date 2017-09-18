<?php

class Application_Model_Response {
	
	public function fetchAll ($stars) {
		
		$url = "https://api.github.com/search/repositories?q=topic:PHP&sort=stars&order=desc";
		$options  = array('http' => array('user_agent'=> $_SERVER['HTTP_USER_AGENT']));
		$context  = stream_context_create($options);
		
		$response = file_get_contents($url, false, $context);
		$response = json_decode($response, true);
		//var_dump($response);
		$total_count = $response['total_count'];
		
		for ($j = 1; $j < $total_count/100; $j++) {
			if ($j == 1)
				$url = "https://api.github.com/search/repositories?q=topic:PHP&sort=stars&order=desc&per_page=100";
			else
				$url = "https://api.github.com/search/repositories?q=topic:PHP&sort=stars&order=desc&page=" . $j ."&per_page=100";
			
			$jsonresponse = file_get_contents($url, false, $context);
			if (!$jsonresponse)
				return true;
			$jsonresponse = json_decode($jsonresponse, true);
			$items = $jsonresponse['items'];
			$length = count($items);
			
			for ($i=0; $i < $length; $i++) {
				$id = $items[$i]['id'];
				$name = $items[$i]['name'];
				$url = $items[$i]['url'];
				$created_at = new DateTime($items[$i]['created_at']);
				$date_created = $created_at->format('Y-m-d H:i:s');
				$pushed_at = new DateTime($items[$i]['pushed_at']);
				$last_updated = $pushed_at->format('Y-m-d H:i:s');
				$description = $items[$i]['description'];
				$stars_count = $items[$i]['stargazers_count'];
				
				$project = new Application_Model_DbTable_Projects();
				if ($stars_count > $stars) {
					$row = $project->getProject($id);
					if ($row) {
						$project->updateProject($id, $name, $url, $date_created, $last_updated, $description, $stars_count, $row['id']);
					} else {
						$project->addProject($id, $name, $url, $date_created, $last_updated, $description, $stars_count);
					}
				} else {
					break 2;
				}
			}
		}
		return true;
	}

}
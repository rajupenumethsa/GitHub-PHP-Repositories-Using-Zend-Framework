<?php

class Application_Model_DbTable_Projects extends Zend_Db_Table_Abstract
{

    protected $_name = 'projects';

    public function getProject($id)
    {
        $id = (int)$id;
        $row = $this->fetchRow('repository_id = ' . $id);
        
        if ($row)
        	return $row->toArray();
        else
        	return $row;
    }

    public function addProject($repo_id, $repo_name, $repo_url, $date_created, $last_updated, $desc, $stars)
    {
        $data = array(
            'repository_id' => $repo_id,
            'repository_name' => $repo_name,
        	'repository_url' => $repo_url,
            'date_created' => $date_created,
        	'last_updated' => $last_updated,
            'description' => $desc,
        	'stars' => $stars
        );
        $this->insert($data);
    }

    public function updateProject($repo_id, $repo_name, $repo_url, $date_created, $last_updated, $desc, $stars, $id)
    {
        $data = array(
            'repository_id' => $repo_id,
            'repository_name' => $repo_name,
        	'repository_url' => $repo_url,
            'date_created' => $date_created,
        	'last_updated' => $last_updated,
            'description' => $desc,
        	'stars' => $stars
        );
        $this->update($data, 'id = '. (int)$id);
    }

}

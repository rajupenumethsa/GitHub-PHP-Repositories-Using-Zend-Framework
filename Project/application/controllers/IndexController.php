<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $form = new Application_Form_Project();
        $form->submit->setLabel('FETCH');
        $this->view->form = $form;
        
        $projectStars = new Zend_Session_Namespace();
        $projectStars->unsetAll();
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            
            if ($form->isValid($formData)) {
            	$stars = $form->getValue('stars');
            	$projectStars->stars = $stars;
            	
                $action = new Application_Model_Response();
                $value = $action->fetchAll($stars);
                
                $this->_helper->redirector('display', 'index');
            } else {
                $form->populate($formData);
            }
        }
            
    }
    
	public function displayAction()
    {
        $projectStars = new Zend_Session_Namespace();
        $projects = new Application_Model_DbTable_Projects();
        $starsQuery = isset($projectStars->stars) ? "stars >={$projectStars->stars}" : false;
        $select = ($starsQuery !== false) ? $projects->select()->where($starsQuery)->order('stars DESC') : $projects->select()->order('stars DESC');
        $projects_list = $projects->fetchAll($select);
        $this->view->projects = $projects_list;
        $this->view->count = $projects_list->count();
    }
    
	public function displayitemAction()
    {
        $id = $this->_getParam('id', 0);
        $projects = new Application_Model_DbTable_Projects();
        $select = $projects->select()->where("repository_id = {$id}");
        $project = $projects->fetchRow($select);
        if ($project) {
        	$this->view->project = $project;
        } else {
        	$this->_helper->redirector('error', 'error');
        }
        
    }

}
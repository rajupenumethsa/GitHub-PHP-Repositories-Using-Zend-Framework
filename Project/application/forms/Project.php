<?php

class Application_Form_Project extends Zend_Form
{
    public function init()
    {
        $this->setName('project');

        $form = new Zend_Form_Element_Text('stars');
        $form->setLabel('Enter star value to display PHP project repositories with equal or more stars')
              ->setRequired(true)
              ->addValidator('Digits');

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');

        $this->addElements(array($form, $submit));
    }
}
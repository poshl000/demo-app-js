<?php
/**
 * Created by PhpStorm.
 * User: isset
 * Date: 12.12.15
 * Time: 17:27
 */

class Application_Model_SecondForm extends Zend_Form {

    public function init()
    {
        parent::init();

        $this->setMethod('post');


        $this->addElement('text', 'subject', array(
            'label'      => 'Subject:',
            'required'   => true,
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(0, 50))
            ),
            'ng-model'   => 'user.subject',
        ));

        $this->addElement('text', 'letter', array(
            'label'      => 'Letter:',
            'required'   => true,
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(0, 50))
            ),
            'ng-model'   => 'user.letter',
        ));


        $this->addElement('button', 'zrobszkic', array(
            'ignore'   => true,
            'label'    => 'Zrob szkic',
            'ng-click'   => 'addszkic(user);',
        ));

        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Save',
        ));

        $this->addElement('hash', 'csrf', array(
            'ignore' => true,
        ));
    }
}
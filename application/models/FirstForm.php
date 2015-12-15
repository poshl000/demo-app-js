<?php
/**
 * Created by PhpStorm.
 * User: isset
 * Date: 12.12.15
 * Time: 17:27
 */

class Application_Model_FirstForm extends Zend_Form {

    public function init()
    {
        parent::init();

        $this->setMethod('post');

        $this->addElement('text', 'email', array(
            'label'      => 'Your email address:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'EmailAddress',
            ),
            'ng-model'   => 'user.email',
            'validator'  => 'required'
        ));

        $this->addElement('text', 'firstname', array(
            'label'      => 'Firstname:',
            'required'   => true,
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(0, 50))
            ),
            'ng-model'   => 'user.firstname',
            'validator'  => 'required'

        ));

        $this->addElement('text', 'lastname', array(
            'label'      => 'Lastname:',
            'required'   => true,
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(0, 50))
            ),
            'ng-model'   => 'user.lastname',
            'validator'  => 'required'

        ));


        $this->addElement('button', 'zrobszkic', array(
            'ignore'   => true,
            'label'    => 'Zrob szkic',
            'ng-click'   => 'addszkic(user)',
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
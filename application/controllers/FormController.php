<?php

class FormController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function storageAction()
    {
        $request = $this->getRequest();
        $this->_helper->viewRenderer->setNoRender(true);

        $data = [];

        if($request->isPost()) {


            $input = json_decode(file_get_contents('php://input'),TRUE);
            $model = new Application_Model_ModelScreen();
            $model
                ->insert([
                    'form_name' => $input['form_name'],
                    'form_data' => json_encode($input['form_data']),
                ]);

        } else {
            $table = new Application_Model_ModelScreen();

            $select = $table->select();
            $select->order(new Zend_Db_Expr("create_date DESC"));

            if(!empty($request->getParam('id'))) {
                $select->where('id = ?', $request->getParam('id'));
                $raw_data = $table->fetchRow($select);
                $data = json_decode( $raw_data['form_data'] , true);
            } else {
                $select->where('form_name = ?', $request->getParam('form_name'));
                $data = $table->fetchAll($select);
            }
        }

        $this->_helper->json->sendJson($data);
    }

    public function form1Action()
    {

        $request = $this->getRequest();

    	$form = new Application_Model_FirstForm();


		if ($this->getRequest()->isPost()) {
		            if ($form->isValid($request->getPost())) {

		                $model = new Application_Model_ModelFirst();
                        $model
                            ->insert([
                                'email' => $form->getValue('email'),
                                'firstname' => $form->getValue('firstname'),
                                'lastname' => $form->getValue('lastname'),
                            ]);

		                return $this->_helper->redirector('form2');
		            }
        }


        $this->view->form = $form;

    }

    public function form2Action()
    {

        $request = $this->getRequest();

        $form = new Application_Model_SecondForm();


        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {

                $model = new Application_Model_ModelTwo();
                $model
                    ->insert([
                        'subject' => $form->getValue('subject'),
                        'letter' => $form->getValue('letter'),
                    ]);

                return $this->_helper->redirector('index');
            }
        }


        $this->view->form = $form;

    }


}
<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

	public function _initRoute(){

		        $router = Zend_Controller_Front::getInstance()->getRouter();
				//var_dump($router);

				//$this->bootstrap('frontcontroller');
				//$front = Zend_Controller_Front::getInstance();
				//$router = $front->getRouter();
				//$myRoutes = new Zend_Config_Ini(APPLICATION_PATH . '/configs/routes.ini', 'production');
				//$router->addConfig($myRoutes, 'routes');

	}

}


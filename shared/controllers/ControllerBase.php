<?php

namespace PhalconStarter\Shared\Controllers;

class ControllerBase extends \Phalcon\Mvc\Controller{
	
	public function initialize(){

		if($this->config->cache->activate)
		{
			$key = $this->dispatcher->getModuleName() . '/' . $this->dispatcher->getControllerName() . '/' . $this->dispatcher->getActionName();

			$this->view->cache(array(
	            'lifetime'=> $this->config->cache->lifetime,
	            'key' => md5($key)
	        ));
		}

	}

}

?>
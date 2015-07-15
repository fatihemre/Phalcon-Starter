<?php

namespace PhalconStarter\Admin;

use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface{
    
    public function registerAutoloaders(\Phalcon\DiInterface $di=null) {
        $loader = new \Phalcon\Loader();

        $loader->registerNamespaces(array(
            'PhalconStarter\Admin\Controllers' => __DIR__.'/controllers/'
        ))->register();
    }

    public function registerServices(\Phalcon\DiInterface $di) {

        $config = $di['config'];

        $di['view']->setViewsDir(__DIR__ . '/../../public/themes/'.$config->site->theme_admin.'/');
        
    }
}
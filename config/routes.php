<?php

$router->removeExtraSlashes(true);

$router->setDefaultModule('site');
$router->setDefaultNamespace('PhalconStarter\Site\Controllers');

$router->notFound(array('namespace'=>'PhalconStarter\Site\Controllers','module'=>'site','controller'=>'index', 'action'=>'notFound'));

/*
* Site Routing
*/

$site = new \Phalcon\Mvc\Router\Group(array(
	'namespace'=>'PhalconStarter\Site\Controllers',
	'module'=>'site',
	'controller'=>'index',
));

$site->add('/',array('action'=>'index'))->setName('anasayfa');
$router->mount($site);


/*
* Admin Routing
*/
$admin = new \Phalcon\Mvc\Router\Group(array(
	'namespace'=>'PhalconStarter\Admin\Controllers',
	'module'=>'admin',
	'controller'=>'index'
));

$admin->setPrefix('/admin');
$admin->add('',array('controller'=>'index'))->setName('admin-index');
$router->mount($admin);
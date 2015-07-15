<?php
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Mvc\Router\Annotations as Router;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Flash\Session as FlashSession;
use Phalcon\DI\FactoryDefault;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Session\Bag as Bag;
use Phalcon\Mvc\Model\Manager as ModelsManager;
use Phalcon\Crypt as Crypt;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Cache\Frontend\Output as CacheOutput;
use Phalcon\Cache\Backend\File as CacheFile;

$di = new FactoryDefault();

$di['session'] = function(){
    $session = new SessionAdapter();
    $session->start();
    return $session;
};

$di['canta'] = function(){
    return new Bag('canta');
};

$di['view'] = function(){
    $view = new View();

    $view->registerEngines(array(
        '.volt' => function($view, $di){
            $volt = new VoltEngine($view, $di);
            $volt->setOptions(array(
                'compiledPath' => __DIR__.'/../cache/volt/',
                'compiledSeparator' => '-',
                'prefix'=>'cache-',
                'compiledExtension' => '.compiled.php',
                'compileAlways' => true,
            ));
            $compiler = $volt->getCompiler();
            $compiler->addFunction('substr', 'substr');

            return $volt;
        }
    ));
    return $view;
    
};

$di['router'] = function(){
    $router = new Router(false);
    require __DIR__.'/routes.php';
    return $router;
};

$di['flash'] = function(){
    return new FlashSession(array(
        'error'   => 'alert alert-danger alert-dismissable',
        'success' => 'alert alert-success alert-dismissable',
        'notice'  => 'alert alert-info alert-dismissable',
        'warning' => 'alert alert-warning alert-dismissable',
    ));
};

$di['config'] = function() use($config){
    return $config;
};

$di['db'] = function () use ($config){
    $connection = new DbAdapter(array(
        'host' => $config->database->host,
        'username' => $config->database->username,
        'password' => $config->database->password,
        'dbname' => $config->database->dbname,
        'charset' => $config->database->charset
    ));
    return $connection;
};

$di['url'] = function() use ($config){
    $url = new UrlResolver();
    $url->setBaseUri($config->site->url);
    return $url;
};

$di['modelsManager'] = function(){
    return new ModelsManager;
};

$di['viewCache'] = function(){
    $frontCache = new CacheOutput();

    $cache = new CacheFile($frontCache, array(
        "cacheDir" => __DIR__ . "/../cache/views/"
    ));

    return $cache;
};

$di['crypt'] = function(){
    $crypt = new Crypt;
    $crypt->setKey('@F9oD.M!jY_kf7|N*#&:qp_o?N$DK`8G'); 
    return $crypt;
};
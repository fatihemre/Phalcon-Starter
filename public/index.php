<?php
use \Phalcon\Mvc\Application as App;

$listen = new Phalcon\Debug;
$listen->listen();

$config = include __DIR__ . '/../config/config.php';
require __DIR__.'/../config/services.php';
require __DIR__.'/../config/loader.php';

$app = new App();

$app->setDI($di);

require __DIR__.'/../config/modules.php';

echo $app->handle()->getContent();
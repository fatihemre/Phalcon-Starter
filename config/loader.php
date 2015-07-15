<?php

use Phalcon\Loader;

$loader = new Loader();

/**
 * Sistem üzerindeki tüm modüller tarafından kullanılabilecek namespaceleri burada tanımlıyoruz.
 */
$loader->registerNamespaces(array(
    'PhalconStarter\Shared\Controllers' => __DIR__.'/../shared/controllers',
    'PhalconStarter\Shared\Models' => __DIR__.'/../shared/models',
    'PhalconStarter\Shared\Plugins' => __DIR__.'/../shared/plugins',
    'PhalconStarter\Shared\Library' => __DIR__.'/../shared/library'
));

$loader->register();
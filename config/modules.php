<?php

$app->registerModules(array(
    'site' => array(
        'className' => 'PhalconStarter\Site\Module',
        'path'      => __DIR__.'/../apps/site/Module.php'
    ),
    'admin' => array(
        'className' => 'PhalconStarter\Admin\Module',
        'path'      => __DIR__.'/../apps/admin/Module.php'
    ),

));
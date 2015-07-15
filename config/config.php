<?php
/**
 * Created by Fatih Emre
 * File: config.php
 * Date: 07.07.2015
 * Time: 11:42
 */

return new \Phalcon\Config(array(
    'database' => array(
        'host'      => 'localhost',
        'username'  => 'root',
        'password'  => '',
        'dbname'    => 'phalcon',
        'charset'   => 'utf8'
    ),
    'cache' => array(
        'activate' => true,
        'lifetime' => 300
    ),
    'site' => array(
        'url' => 'http://phalcon-starter.dev',
        'theme' => 'site/default',
        'theme_admin' => 'admin/default'
    )
));
<?php
/**
 * Created by PhpStorm.
 * User: too
 * Date: 2018/7/20
 * Time: 11:15
 * @author too <hayto@foxmail.com>
 */

define('ROOT', __DIR__);
require ROOT. '/../vendor/autoload.php';
require ROOT. '/../vendor/thsoft/framework/src/Thsoft.php';
$config = require ROOT. '/../app/http/conf/main.php';


$app = new \Thsoft\base\Application($config);

//$obj = \Thsoft\Thsoft::$container->get(\app\http\testdi\Car::class);
//$obj = \Thsoft\Thsoft::$container->get(\app\http\testdi\Car::class);
//var_dump($obj);
var_dump($app->car);die;
//var_dump($app->run());
//die;
//var_dump();
var_dump($app);die;
$app->run();
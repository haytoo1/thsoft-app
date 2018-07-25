<?php
/**
 * Created by PhpStorm.
 * User: too
 * Date: 2018/7/20
 * Time: 11:15
 * @author too <hayto@foxmail.com>
 */

require __DIR__. '/../vendor/autoload.php';

$config = require __DIR__. '/../app/http/conf/main.php';


$app = new \Thsoft\base\Application($config);
var_dump($app);
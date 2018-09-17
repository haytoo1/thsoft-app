<?php
/**
 * Created by PhpStorm.
 * User: too
 * Date: 2018/9/17
 * Time: 13:56
 * @author too <hayto@foxmail.com>
 */


$client = new \Swoole\Client(SWOOLE_TCP);
$client->connect('0.0.0.0', 9393, -1);

$data = 'abcd';
// 必须指定 4字节 网络字节序的长度值
$data = pack('N', strlen($data)). $data;

$client->send($data);
$data = $client->recv();
var_dump($data);
<?php
/**
 * Created by PhpStorm.
 * User: Hong Tu <hayto@foxmail.com>
 * Date: 2018/7/25
 * Time: 21:01
 */




$s = microtime(true);

$n= 1000000;

$map = new \Ds\Map();
//$map = [];
for ($i=0; $i<$n; $i++){
    $map->put($i, $i);
//    $map[$i] = $i;
}
for ($i=0; $i<$n-1; $i++){
    $map->get($i);
//    $map[$i];
}

$e = microtime(true);

echo $e- $s;
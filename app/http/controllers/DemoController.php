<?php
/**
 * Created by PhpStorm.
 * User: Hong Tu <hayto@foxmail.com>
 * Date: 2018/7/16
 * Time: 23:06
 */

namespace app\controllers;

class DemoController
{
    public function index()
    {
        echo "我是 ".self::class. "::index方法";
    }
}


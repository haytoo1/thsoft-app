<?php
/**
 * Created by PhpStorm.
 * User: too
 * Date: 2018/7/20
 * Time: 15:14
 * @author too <hayto@foxmail.com>
 */

namespace app\http\testdi;


use Thsoft\base\BaseObject;

class WheelA extends BaseObject implements WheelInterface
{
    public $brand = '米其林';
}
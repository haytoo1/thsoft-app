<?php
/**
 * Created by PhpStorm.
 * User: too
 * Date: 2018/7/20
 * Time: 15:12
 * @author too <hayto@foxmail.com>
 */

namespace app\http\testdi;


use Thsoft\base\BaseObject;

class Car extends BaseObject
{
    public $name;
    public $age;
    /**
     * @var Wheel|null
     */
    public $wheel = null;
    public function __construct(WheelA $wheel, $name, $age=18)
    {
        $this->wheel = $wheel;

    }

    public function run()
    {
        return "Car can run use {$this->wheel->brand}, age is {$this->age}";
    }

}
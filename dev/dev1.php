<?php
/**
 * Created by PhpStorm.
 * User: Hong Tu <hayto@foxmail.com>
 * Date: 2018/7/23
 * Time: 21:37
 */

class 亚洲{
    public function 哔哔()
    {
        echo "吃饭";
    }
}

class 芮成钢{
    /**
     * @var A object
     */
    private $被代表的对象;
    public function __construct(object $object)
    {
        $this->被代表的对象 = $object;
    }

    public function 哔哔()
    {
        echo "我想我可以代表亚洲:";
        $this->被代表的对象->哔哔();
    }
}


$y = new 亚洲();
$r = new 芮成钢($y);
$r->哔哔();

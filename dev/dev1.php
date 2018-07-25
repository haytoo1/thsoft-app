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

class 芮成钢之哔哔代理{
    /**
     * @var A object
     */
    private $被代表的对象;
    public function __construct(object $object)
    {
        $this->被代表的对象 = $object;
    }
    public function invoke($action)
    {
        echo "我想我可以代表亚洲:";
        $this->被代表的对象->$action();
    }
}

class 总统之权利代理{
    /**
     * @var Website
     */
    private $被代表的对象;

    public function __construct(芮成钢之哔哔代理 $object)
    {
        $this->被代表的对象 = $object;
    }
    public function invoke($action)
    {
        echo "我想我可以代表你爸爸打你:";
        $this->被代表的对象->$action();
    }
}


$y = new 亚洲();
// 被各种代理夹带私货
$r = new 芮成钢之哔哔代理($y);
$r->invoke('哔哔');

$r1 = new 总统之权利代理($y);
$r1->invoke('哔哔');



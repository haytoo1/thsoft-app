<?php
/**
 * Created by PhpStorm.
 * User: Hong Tu <hayto@foxmail.com>
 * Date: 2018/7/26
 * Time: 19:31
 */

/**
 * 闭包也是对象, 内部有魔术方法__invoke, 当闭包后面有()的时候此魔术方法会被调用
 * 闭包对象内部有bindTo方法, 可以把闭包绑定给指定对象
 */

class Obj{
    private $num = 5;
}

$closure = function (){
    $this->num += 3;
    return $this->num;
};

// 把闭包绑定到Obj对象, 然后闭包里的$this就代表Obj对象, 可以访问Obj对象的属性
// 第二个参数是作用于, 决定了闭包内$this的访问权限
$newClosure = $closure->bindTo(new Obj(), new Obj());

echo $newClosure(); // 8

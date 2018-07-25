<?php
/**
 * Created by PhpStorm.
 * User: too
 * Date: 2018/7/20
 * Time: 13:39
 * @author too <hayto@foxmail.com>
 */

return [
    'basePath' => dirname(__DIR__),

    'components'=>[
        'car'=>[
            'class'=>\app\http\testdi\Car::class,
            'construct'=>[\app\http\testdi\WheelB::class],
            'config'=>[
                'age'=>18
            ],
        ]
        /*'request'=>[
            'class'=>'',

        ],
        'response'=>[
            'class'=>\Thsoft\http\Response::class
        ]*/
    ]
];
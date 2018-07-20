<?php
/**
 * Created by PhpStorm.
 * User: too
 * Date: 2018/7/20
 * Time: 13:39
 * @author too <hayto@foxmail.com>
 */

return [
    'server'=>[
        'host'=>'0.0.0.0',
        'port'=>1943,
        /*'config'=>[

        ]*/
    ],
    'components'=>[
        'car'=>[
            'class'=>\app\http\testdi\Car::class,
//            'con'
        ]
        /*'request'=>[
            'class'=>'',

        ],
        'response'=>[
            'class'=>\Thsoft\http\Response::class
        ]*/
    ]
];
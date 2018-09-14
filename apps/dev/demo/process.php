<?php
/**
 * Created by PhpStorm.
 * User: too
 * Date: 2018/9/14
 * Time: 16:29
 * @author too <hayto@foxmail.com>
 */

// 外部是父进程
cli_set_process_title('x_fa');

// 函数内是子进程
$func = function (\Swoole\Process $worker){
    // 子进程
    cli_set_process_title('x_sun'.time());

    // 两种方式获取子进程 ID
    posix_getpid();
    $worker->pid;

    while (true){
        $worker->write("我是子进程");
        file_put_contents('a.txt', "子进程\n", FILE_APPEND);
        sleep(10);
    }
};

// 一个对象代表一个子进程
$process = new \Swoole\Process($func);
$process->start();

$process->pid; // 父进程 获取子进程 ID
$process->read(); // 父进程获取子进程发送的数据


<?php
/**
 * Created by PhpStorm.
 * User: too
 * Date: 2018/9/17
 * Time: 13:34
 * @author too <hayto@foxmail.com>
 */

// 进程池还是莫名有很多问题, 暂时先不用

// 外部是父进程
cli_set_process_title('x_fa');
//\Swoole\Process::daemon();

$workerNum = 2;
$pool = new \Swoole\Process\Pool($workerNum, SWOOLE_IPC_SOCKET, 1);

$pool->on('workerStart', function (\Swoole\Process\Pool $pool, $workerId){
    cli_set_process_title("x_sun{$workerId}-". posix_getpid());
    $process = $pool->getProcess();
    var_dump($process);
    /*while (true) {
        var_dump("start workerId: {$workerId}\r\n");
        sleep(5);
    }*/
});

// SWOOLE_IPC_SOCKET 通信时, 才指定此参数
$pool->listen('0.0.0.0', 9393);

// ipc_type 非 0 时, 才有进程间通信, 才需要设置 message 回调
// ipc_type 为 0 时直接把业务写在 workerStart 内
$pool->on('message', function (\Swoole\Process\Pool $pool, $data){
    $pool->write("收到: {$data}-".posix_getpid());

    sleep(1);
});



$pool->on('workerStop', function (\Swoole\Process\Pool $pool, $workerId){
    var_dump("stop workerId: {$workerId}\r\n");
});

$pool->start();

#region 撒地方
#endregion
#region 555
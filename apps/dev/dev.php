<?php
/**
 * Created by PhpStorm.
 * User: too
 * Date: 2018/9/14
 * Time: 14:22
 * @author too <hayto@foxmail.com>
 */

$serv = new \Swoole\Server('0.0.0.0', 9393, SWOOLE_PROCESS);
$serv->set([
    'reactor_num'=>4,
    'worker_num'=>6,
    'task_worker_num'=>2
]);


$serv->on('connect', function (){});
$serv->on('receive', function (){});
$serv->on('task', function (){});
$serv->on('finish', function (){});



$serv->on('workerstart', function (\Swoole\Server $server, $workId){
    if($workId >= $server->setting['worker_num']){
        cli_set_process_title("x_tasker-{$workId}");
    }else{
        cli_set_process_title("x_worker-{$workId}");
    }
});
$serv->on('managerstart', function (){
    cli_set_process_title('x_manager');
});
$serv->on('start', function (){
    cli_set_process_title('x_master');
});

$serv->start();
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
$process = createProcess();

// 父进程处理 SIGCHLD 信号
//子进程退出时, 会给父进程发送此信号
Swoole\Process::signal(SIGCHLD, function (){
    // 触发此事件, 表示子进程退出了, 回收它
    $status = swoole_process::wait(false);
    $msg = "子进程 {$status['pid']} 被 kill - {$status['signal']} 干掉了, 退出码{$status['code']}";
    var_dump($msg);
    // 然后再启一个子进程
    createProcess();
});


// 创建子进程
function createProcess()
{
    // 函数内是子进程
    $func = function (\Swoole\Process $worker){
        \Swoole\Process::setaffinity([0]);
        $worker->name("x_sun-{$worker->pid}");
        while (true){
            $worker->write("我是子进程:{$worker->pid}");
            sleep(1);
        }
    };

    // 一个对象代表一个子进程
    $process = new \Swoole\Process($func);
    $process->start();

    // 将子进程管道加入事件循环
    swoole_event_add($process->pipe, function ($pipe)use($process){
        var_dump("从子进程读取消息:{$process->read()}");
    });

    return $process;
}



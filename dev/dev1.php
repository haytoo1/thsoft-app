<?php
/**
 * Created by PhpStorm.
 * User: Hong Tu <hayto@foxmail.com>
 * Date: 2018/7/23
 * Time: 21:37
 */

for ($i =0; $i<3; $i++){
    $process = new \Swoole\Process(function (\Swoole\Process $process)use($i){
        cli_set_process_title("swooleprocess-{$i}");
//        while (1){
            echo $process->read();
//        }

        sleep(5);
        $process->close();

    });
    $process->write("task:{$i}\r\n");
    $process->start();
}

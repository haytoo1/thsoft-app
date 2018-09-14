<?php
/**
 * Created by PhpStorm.
 * User: too
 * Date: 2018/9/14
 * Time: 15:10
 * @author too <hayto@foxmail.com>
 */

namespace apps\dev;

/**
 * swoole 事件类
 * Class SwooleEvent
 * @package apps\dev
 * @author too <hayto@foxmail.com>
 */
class SwooleEvent
{
    /**
     * Master 进程的 Master 线程中执行
     * 此时 Manager, worker, tasker 进程都已创建, 所有端口也已监听, 但尚未开始 accept 连接
     */
    const ON_START = 'start';

    /**
     * 服务器正常退出时触发
     * 此时已关闭所有 reactor, 心跳检测, udp收包线程
     * 已关闭所有 worker, tasker, user 进程
     * 已关闭所有监听端口
     */
    const ON_SHUT_DOWN = 'shutdown';

    /**
     * worker/tasker 进程启动时触发
     * $workerID >= worker_num 的进程就是 tasker, 其他都是 worker
     */
    const ON_WORKER_START = 'workerstart';

    /**
     * worker/ tasker 进程正常终止时触发
     */
    const ON_WORKER_STOP = 'workerstop';

    /**
     * 仅开启 reload_async 特性后有效
     * 仅在 worker 进程内触发, tasker 不会触发
     * 异步重启时, 先创建新的 worker 进程处理新请求, 旧 worker 自行退出
     * worker 进程未退出, 此事件会持续触发
     */
    const ON_WORKER_EXIT = 'workerexit';

    /**
     * worker/ tasker 发生异常后, 会在 manager 进程中回调此函数
     * 可用于报警和监控
     */
    const ON_WORKER_ERROR = 'workererror';

    /**
     * 有新连接进入时, 在 worker 进程中触发
     * 只在 tcp 连接下触发, udp 不触发
     */
    const ON_CONNECT = 'connect';

    /**
     * 接收到 tcp 数据时, 在 worker 进程中触发
     * 只支持 udp
     */
    const ON_RECEIVE = 'receive';

    /**
     * 接收到 udp 数据时, 在 worker 中触发
     */
    const ON_PACKET = 'packet';

    /**
     * tcp 连接断开时, 在 worker 进程中触发
     * 如果此事件异常, 通过 netstat 会看到大量 CLOSE_WAIT 状态的 tcp 连接
     */
    const ON_CLOSE = 'close';

    /**
     * 缓冲区达到最高水位线时触发
     */
    const ON_BUFFER_FULL = 'bufferfull';

    /**
     * 缓冲区低于最低水位线时触发
     */
    const ON_BUFFER_EMPTY = 'bufferempty';

    /**
     * 在 tasker 中触发
     * 收到 worker 投递的数据时
     */
    const ON_TASK = 'task';

    /**
     * tasker 调用 finish 方法或者 return 时, 会在 worker 进程中触发
     * 执行此事件和下发 tasker 任务的是同一个 worker 进程
     */
    const ON_FINISH = 'finish';

    /**
     * 收到由 sendMessage 发送的管道消息时会触发
     * worker / tasker 都能触发
     */
    const ON_PIPE_MESSAGE = 'pipemessage';

    /**
     * 管理进程启动时触发
     * manager 中不能添加定时器, 但可以 sendMessage 向其他进程发消息
     */
    const ON_MANAGER_START = 'managerstart';

    /**
     * 管理进程结束时
     */
    const ON_MANAGER_STOP = 'managerstop';






    /**
     * httpServer 不接受 connect 和 receive 事件
     * httpServer 也能接受 websocket 请求
     * 多接受一个 request 事件
     */
    /**
     * 收到完整的 http 请求时触发
     */
    const ON_REQUEST = 'request';






    /**
     * websocket 除了接收 server 和 httpserver 事件
     * 额外增加了以下三个事件
     */

    /**
     * websocket 建立连接, 并握手后 会调用此函数
     */
    const ON_OPEN = 'open';

    /**
     * websocket 建立连接后进行握手,
     * websocket 服务器已经内置了 handshake, 如果想自行处理握手, 可以使用此事件
     * 设置此事件后不再触发 open
     * 此事件返回 true 表示握手成功
     */
    const ON_HAND_SHAKE = 'handshake';

    /**
     * 收到客户端数据时触发
     * 客户端发送的 ping 帧不会触发此函数, 底层会自动回复 pong 包
     */
    const ON_MESSAGE = 'message';

}
<?php


namespace App\Controller;


use Hyperf\Contract\OnCloseInterface;
use Hyperf\Contract\OnMessageInterface;
use Hyperf\Contract\OnOpenInterface;
use Hyperf\Utils\ApplicationContext;
use Redis;
use Swoole\Http\Request;
use Swoole\Websocket\Frame;
use Swoole\WebSocket\Server;

class PointToPointController implements OnMessageInterface , OnOpenInterface, OnCloseInterface
{

    public function onOpen(Server $server, Request $request): void
    {
        // TODO: Implement onOpen() method.
        $server->push($request->fd, 'Opened');
    }

    public function onMessage(Server $server, Frame $frame): void
    {
        // TODO: Implement onMessage() method.
        $redis = (ApplicationContext::getContainer())->get(Redis::class) ;

        var_dump($redis->keys("*"));

        foreach ($server->connections as $connection) {
            if($server->isEstablished($connection)){
                $server->push($connection, 'Recv: ' . $frame->data);
            }
        }
    }

    public function onClose(\Swoole\Server $server, int $fd, int $reactorId): void
    {
        // TODO: Implement onClose() method.
        var_dump("close");
    }


}
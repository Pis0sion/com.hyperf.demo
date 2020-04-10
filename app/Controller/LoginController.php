<?php


namespace App\Controller;


use Hyperf\Contract\OnCloseInterface;
use Hyperf\Contract\OnMessageInterface;
use Hyperf\Contract\OnOpenInterface;
use Swoole\Http\Request;
use Swoole\Websocket\Frame;
use Swoole\WebSocket\Server;

class LoginController implements OnOpenInterface , OnMessageInterface , OnCloseInterface
{

    public function onOpen(Server $server, Request $request): string
    {
        // TODO: Implement onOpen() method.
        return "hello" ;
    }

    public function onClose(\Swoole\Server $server, int $fd, int $reactorId): string
    {
        // TODO: Implement onClose() method.
        return "world" ;
    }

    public function onMessage(Server $server, Frame $frame): string
    {
        // TODO: Implement onMessage() method.
        return "pis0sion" ;
    }

}

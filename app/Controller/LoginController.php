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

    public function onOpen(Server $server, Request $request): void
    {
        // TODO: Implement onOpen() method.
    }

    public function onClose(\Swoole\Server $server, int $fd, int $reactorId): void
    {
        // TODO: Implement onClose() method.
    }

    public function onMessage(Server $server, Frame $frame): void
    {
        // TODO: Implement onMessage() method.
    }

}
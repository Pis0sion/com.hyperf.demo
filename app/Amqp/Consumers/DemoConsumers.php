<?php


namespace App\Amqp\Consumers;


use Hyperf\Amqp\Message\ConsumerMessage;
use Hyperf\Amqp\Annotation\Consumer;
use Hyperf\Amqp\Result;

/**
 * Class DemoConsumers
 * @package App\Amqp\Consumers
 * @Consumer(exchange="pis0sion-1",routingKey="pis0sion-1-key",queue="handle",nums=1)
 */
class DemoConsumers extends ConsumerMessage
{

    /**
     * @param $data
     * @return string
     */
    public function consume($data): string
    {
        // TODO: Implement consume() method.
        var_dump($data);
        return Result::ACK ;
    }
}
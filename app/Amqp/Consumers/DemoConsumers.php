<?php


namespace App\Amqp\Consumers;


use Hyperf\Amqp\Message\ConsumerMessage;
use Hyperf\Amqp\Annotation\Consumer;
use Hyperf\Amqp\Result;

/**
 * Class DemoConsumers
 * @package App\Amqp\Consumers
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
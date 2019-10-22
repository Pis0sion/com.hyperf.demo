<?php


namespace App\Amqp\Producers;


use App\Model\Users;
use Hyperf\Amqp\Annotation\Producer;
use Hyperf\Amqp\Message\ProducerMessage;

/**
 * Class DemoProducers
 * @package App\Amqp\Producers
 * @Producer(exchange="pis0sion",routingKey="pis0sion-key")
 */
class DemoProducers extends ProducerMessage
{
    /**
     * DemoProducers constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $data = Users::findFromCache(1) ;
        $this->payload = compact('id','data') ;
    }
}
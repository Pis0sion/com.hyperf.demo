<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

namespace Hyperf\Amqp\Builder;

class QueueBuilder extends Builder
{
    protected $queue;

    protected $exclusive = false;

    protected $arguments = [
        //'x-ha-policy' => ['S', 'all'],
        'x-queue-type'  => ['S','classic'] ,
//        'x-message-ttl'  => ['I',3] ,
    ];

    public function getQueue(): string
    {
        return $this->queue;
    }

    public function setQueue(string $queue): self
    {
        $this->queue = $queue;
        return $this;
    }

    public function isExclusive(): bool
    {
        return $this->exclusive;
    }

    public function setExclusive(bool $exclusive): self
    {
        $this->exclusive = $exclusive;
        return $this;
    }
}

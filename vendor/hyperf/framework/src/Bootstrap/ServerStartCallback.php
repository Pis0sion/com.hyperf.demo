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

namespace Hyperf\Framework\Bootstrap;

use App\Common\TableMemory;
use Hyperf\Di\Container;
use Hyperf\Memory\TableManager;
use Hyperf\Server\ServerFactory;
use Psr\Container\ContainerInterface;
use Swoole\Table;

class ServerStartCallback
{

    /**
     * @var ContainerInterface
     */
    private $container ;

    /**
     * ServerStartCallback constructor.
     * @param ContainerInterface $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container ;
    }


    public function beforeStart()
    {
        // TODO:
        echo "swoole table init....".PHP_EOL;
    }

}

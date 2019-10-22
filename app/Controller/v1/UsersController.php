<?php


namespace App\Controller\v1;

use App\Amqp\Producers\DemoProducers;
use App\Model\Users;
use App\Repositories\UsersRepositories;
use Hyperf\Amqp\Producer;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;
use Hyperf\HttpServer\Contract\RequestInterface;
use Psr\Container\ContainerInterface;

/**
 * Class UsersController
 * @package App\Controller\v1
 * @Controller()
 */
class UsersController
{
    /**
     * @Inject()
     * @var UsersRepositories
     */
    private $userRepositories ;


    /**
     * @RequestMapping(path="/user/info",methods={"POST","GET"})
     * @param RequestInterface $request
     * @return mixed
     */
    public function info(RequestInterface $request): ?Users
    {
        return $this->userRepositories->getUserInfo() ;
    }

    /**
     * @RequestMapping(path="/user/wallets",methods={"POST","GET"})
     * @return float
     */
    public function wallets()
    {
        return $this->userRepositories->getUserWallets() ;
    }

    /**
     * @RequestMapping(path="/user/task",methods={"POST","GET"})
     * @param ContainerInterface $container
     * @return bool
     */
    public function tasks(ContainerInterface $container):bool
    {
        $producers = new DemoProducers(1) ;
        $producer = $container->get(Producer::class) ;
        return $producer->produce($producers) ;
    }

}
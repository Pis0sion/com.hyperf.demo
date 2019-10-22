<?php


namespace App\Controller\v1;

use App\Repositories\EntryRepositories;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;

/**
 * Class EntryController
 * @package App\Controller\v1
 * @Controller()
 */
class EntryController
{

    /**
     * @Inject()
     * @var EntryRepositories
     */
    private $entryRepositories ;

    /**
     * @return string
     * @RequestMapping(path="/entry/login",methods={"POST","GET"})
     */
    public function login(): string
    {
        return $this->entryRepositories->login() ;
    }


}
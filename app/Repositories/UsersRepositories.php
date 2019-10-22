<?php


namespace App\Repositories;


use App\Model\Users;

/**
 * Class UsersRepositories
 * @package App\Repositories
 */
class UsersRepositories
{
    /**
     * @return mixed
     */
    public function getUserInfo(): ?Users
    {
        return Users::findFromCache(1)->setVisible(['id','name']) ;
    }

    /**
     * @return float
     */
    public function getUserWallets(): float
    {
        return (float)12.00 ;
    }
}
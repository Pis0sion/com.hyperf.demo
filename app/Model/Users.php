<?php
declare(strict_types=1);


namespace App\Model;


use Hyperf\DbConnection\Model\Model;
use Hyperf\ModelCache\Cacheable;
use Hyperf\ModelCache\CacheableInterface;

/**
 * Class Users
 * @package App\Model
 */
class Users extends Model implements CacheableInterface
{
    /**
     * trait
     */
    use Cacheable ;

    /**
     * @var string
     */
    protected $table = "as_user";

    /**
     * @var string
     */
    protected $primaryKey = "id";

    /**
     * @var bool
     */
    public $timestamps = true ;

    /**
     *
     */
    const CREATED_AT = "create_time" ;

    /**
     *
     */
    const UPDATED_AT = "update_time" ;

}
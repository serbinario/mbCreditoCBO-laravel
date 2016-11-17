<?php

namespace MbCreditoCBO\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use MbCreditoCBO\Validators\UserHoleValidator;
use MbCreditoCBO\Repositories\UserHoleRepository;
use MbCreditoCBO\Entities\UserHole;

/**
 * Class UserRoleRepositoryEloquent
 * @package namespace App\Repositories;
 */
class UserHoleRepositoryEloquent extends BaseRepository implements UserHoleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserHole::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

         return UserHoleValidator::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

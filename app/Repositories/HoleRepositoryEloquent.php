<?php

namespace MbCreditoCBO\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use MbCreditoCBO\Repositories\HoleRepository;
use MbCreditoCBO\Entities\Hole;
//use MbCreditoCBO\Validators\HoleValidator;;

/**
 * Class RoleRepositoryEloquent
 * @package namespace App\Repositories;
 */
class HoleRepositoryEloquent extends BaseRepository implements HoleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Hole::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

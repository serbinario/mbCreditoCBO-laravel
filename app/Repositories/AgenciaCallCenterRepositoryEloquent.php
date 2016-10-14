<?php

namespace MbCreditoCBO\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use MbCreditoCBO\Validators\AgenciaCallCenterValidator;
use MbCreditoCBO\Repositories\AgenciaCallCenterRepository;
use MbCreditoCBO\Entities\AgenciaCallCenter;

/**
 * Class AgenciaCallCenterRepositoryEloquent
 * @package namespace App\Repositories;
 */
class AgenciaCallCenterRepositoryEloquent extends BaseRepository implements AgenciaCallCenterRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return AgenciaCallCenter::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

         return AgenciaCallCenterValidator::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

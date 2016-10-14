<?php

namespace MbCreditoCBO\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use MbCreditoCBO\Validators\ConvenioCallCenterValidator;
use MbCreditoCBO\Repositories\ConvenioCallCenterRepository;
use MbCreditoCBO\Entities\ConvenioCallCenter;

/**
 * Class ConvenioCallCenterRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ConvenioCallCenterRepositoryEloquent extends BaseRepository implements ConvenioCallCenterRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ConvenioCallCenter::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

         return ConvenioCallCenterValidator::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

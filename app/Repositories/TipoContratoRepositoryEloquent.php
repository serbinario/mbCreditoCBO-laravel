<?php

namespace MbCreditoCBO\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use MbCreditoCBO\Validators\TipoContratoValidator;
use MbCreditoCBO\Repositories\TipoContratoRepository;
use MbCreditoCBO\Entities\TipoContrato;

/**
 * Class TipoContratoRepositoryEloquent
 * @package namespace App\Repositories;
 */
class TipoContratoRepositoryEloquent extends BaseRepository implements TipoContratoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TipoContrato::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

         return TipoContratoValidator::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

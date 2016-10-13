<?php

namespace cboMbcredito\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use cboMbcredito\Validators\OperadorValidator;
use cboMbcredito\Repositories\OperadorRepository;
use cboMbcredito\Entities\Operador;

/**
 * Class OperadorRepositoryEloquent
 * @package namespace App\Repositories;
 */
class OperadorRepositoryEloquent extends BaseRepository implements OperadorRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Operador::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

         return OperadorValidator::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

<?php

namespace MbCreditoCBO\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use MbCreditoCBO\Validators\TelefoneValidator;
use MbCreditoCBO\Repositories\TelefoneRepository;
use MbCreditoCBO\Entities\Telefone;

/**
 * Class TelefoneRepositoryEloquent
 * @package namespace App\Repositories;
 */
class TelefoneRepositoryEloquent extends BaseRepository implements TelefoneRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Telefone::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

         return TelefoneValidator::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

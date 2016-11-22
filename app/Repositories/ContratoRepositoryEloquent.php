<?php

namespace MbCreditoCBO\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use MbCreditoCBO\Validators\ContratoValidator;
use MbCreditoCBO\Repositories\ContratoRepository;
use MbCreditoCBO\Entities\Contrato;

/**
 * Class ContratoRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ContratoRepositoryEloquent extends BaseRepository implements ContratoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Contrato::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

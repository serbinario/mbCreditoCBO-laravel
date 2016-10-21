<?php

namespace MbCreditoCBO\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use MbCreditoCBO\Validators\UsuarioValidator;
use MbCreditoCBO\Repositories\UsuarioRepository;
use MbCreditoCBO\Entities\Usuario;

/**
 * Class UsuarioRepositoryEloquent
 * @package namespace App\Repositories;
 */
class UsuarioRepositoryEloquent extends BaseRepository implements UsuarioRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Usuario::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

         return UsuarioValidator::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

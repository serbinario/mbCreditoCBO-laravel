<?php

namespace MbCreditoCBO\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class AgenciaCallCenter extends Model implements Transformable
{
    use TransformableTrait;

    protected $table    = 'agencias_callcenter';

//    protected $primaryKey = 'id_operadores';

    protected $fillable = [
        'id',
		'numero_agencia',
		'nome_agencia',
	];

    /**
     * @param $query
     * @return mixed
     */
    public function scopeResolvedName($query)
    {
        return $query->select(['nome_agencia as nome', 'id']);
    }

}
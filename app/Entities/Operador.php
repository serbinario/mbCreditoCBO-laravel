<?php

namespace MbCreditoCBO\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Operador extends Model implements Transformable
{
    use TransformableTrait;

    protected $table      = 'operadores';

    protected $primaryKey = 'id_operadores';

    protected $fillable = [
		'cod_operadores',
		'nome_operadores',
		'status_operadores',
	];

    /**
     * @param $query
     * @return mixed
     */
    public function scopeResolvedName($query)
    {
        return $query->select(['nome_operadores as nome', 'id_operadores as id']);

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function usuario()
    {
        return $this->hasOne(Usuario::class, 'id_operadores');

    }
}
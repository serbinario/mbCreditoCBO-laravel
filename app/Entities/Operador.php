<?php

namespace MbCreditoCBO\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Operador extends Model implements Transformable
{
    use TransformableTrait;

    protected $table    = 'operadores';

    protected $primaryKey = 'id_operadores';

    protected $fillable = [ 
//		'id_operadores',
		'cod_operadores',
		'nome_operadores',
		'status_operadores',
	];

}
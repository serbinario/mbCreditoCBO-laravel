<?php

namespace MbCreditoCBO\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Cliente extends Model implements Transformable
{
    use TransformableTrait;

    protected $table    = 'clientes';

    protected $fillable = [ 
		'agencia_id',
		'name',
		'cpf',
		'conta',
		'user_id',
	];

}
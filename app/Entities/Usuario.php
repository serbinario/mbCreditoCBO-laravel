<?php

namespace MbCreditoCBO\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Usuario extends Model implements Transformable
{
    use TransformableTrait;

    protected $table    = 'users';

    protected $fillable = [ 
		'id_operadores',
		'username',
		'password',
		'salt',
		'email',
		'active',
	];

}
<?php

namespace MbCreditoCBO\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class UserHole extends Model implements Transformable
{
    use TransformableTrait;

    protected $table    = 'users_has_roles';

    protected $fillable = [ 
		'user_id',
		'role_id',
	];

}
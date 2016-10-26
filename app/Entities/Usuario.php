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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userHole()
    {
        return $this->hasMany(UserHole::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function roles()
    {
        return $this->belongsToMany(Hole::class, 'users_has_roles', 'user_id', 'role_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function operador()
    {
        return $this->belongsTo(Operador::class, 'id_operadores');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeResolvedName($query)
    {
        return $query->select(['operadores.nome_operadores as nome', 'users.id'])
                ->join('operadores', 'operadores.id_operadores', '=', 'users.id_operadores');
    }
}
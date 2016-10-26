<?php

namespace MbCreditoCBO\Entities;

use Illuminate\Database\Eloquent\Model;
use MbCreditoCBO\Repositories\RoleRepository;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class UserHole extends Model implements Transformable
{
    use TransformableTrait;

    protected $table      = 'users_has_roles';

    protected $fillable   = [
		'user_id',
		'role_id'
	];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hole()
    {
        return $this->belongsTo(Hole::class, 'role_id');
    }

}
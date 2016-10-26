<?php

namespace MbCreditoCBO\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Hole extends Model implements Transformable
{
    use TransformableTrait;

    protected $table    = 'roles';

    protected $fillable = [
        'role',
        'slug',
        'description',
        'level',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userHole()
    {
        return $this->hasMany(UserHole::class, 'role_id');
    }
}
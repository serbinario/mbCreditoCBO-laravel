<?php

namespace MbCreditoCBO\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class TipoContrato extends Model implements Transformable
{
    use TransformableTrait;

    protected $table    = 'tipo_contrato';

    protected $fillable = [ 
		'tipo_contrato',
	];

}
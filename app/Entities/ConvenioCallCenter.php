<?php

namespace MbCreditoCBO\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ConvenioCallCenter extends Model implements Transformable
{
    use TransformableTrait;

    protected $table    = 'convenios_callcenter';

    protected $fillable = [ 
		'nome_convenio',
	];

}
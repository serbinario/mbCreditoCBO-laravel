<?php

namespace MbCreditoCBO\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Documento extends Model implements Transformable
{
    use TransformableTrait;

    protected $table    = 'documentos';

    protected $fillable = [ 
		'path_arquivo',
        'chamada_id'
	];

}
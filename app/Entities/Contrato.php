<?php

namespace MbCreditoCBO\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Contrato extends Model implements Transformable
{
    use TransformableTrait;

    protected $table    = 'chamadas';

    protected $fillable = [ 
		'cliente_id',
		'tipo_contrato_id',
		'convenio_id',
		'prazo',
		'valor_contratado',
		'data_contratado',
		'status_chamada',
		'codigo_transacao',
		'data_prox_chamada',
	];

}
<?php

namespace MbCreditoCBO\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Contrato extends Model implements Transformable
{
    use TransformableTrait;

    protected $table      = 'chamadas';

//    protected $primaryKey = 'cliente_id';

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeResolvedName($query)
    {
        return $query->select(['prazo as nome', 'id']);
    }

}
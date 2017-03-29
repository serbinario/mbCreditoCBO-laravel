<?php

namespace MbCreditoCBO\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use MbCreditoCBO\Uteis\SerbinarioDateFormat;

class Contrato extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'chamadas';

    protected $dates = [
        "data_prox_chamada",
        "data_contratado"
    ];

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
        'matricula',
        'user_id'
	];

    /**
     *
     * @return \DateTime
     */
    public function getDataContratadoAttribute()
    {
        return SerbinarioDateFormat::toBrazil($this->attributes['data_contratado']);
    }

    /**
     *
     * @return \DateTime
     */
    public function setDataContratadoAttribute($value)
    {
        $this->attributes['data_contratado'] = SerbinarioDateFormat::toUsa($value);
    }

    /**
     *
     * @return \DateTime
     */
    public function getDataProxChamadaAttribute()
    {
        return SerbinarioDateFormat::toBrazil($this->attributes['data_prox_chamada']);
    }

    /**
     *
     * @return \DateTime
     */
    public function setDataProxChamadaAttribute($value)
    {
        $this->attributes['data_prox_chamada'] = SerbinarioDateFormat::toUsa($value);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoContrato()
    {
        return $this->belongsTo(TipoContrato::class, 'tipo_contrato_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function convenio()
    {
        return $this->belongsTo(ConvenioCallCenter::class, 'convenio_id');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeResolvedName($query)
    {
        return $query->select(['prazo as nome', 'id']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documentos()
    {
        return $this->hasMany(Documento::class, 'chamada_id');
    }
}
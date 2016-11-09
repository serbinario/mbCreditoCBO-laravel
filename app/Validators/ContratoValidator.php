<?php

namespace MbCreditoCBO\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ContratoValidator extends LaravelValidator
{
    protected $messages   = [
    ];

    protected $attributes = [
        'cliente.name' => 'Nome'
    ];

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [

            /*'cliente.name' => 'required|max:200', //alpha space
            'cliente.cpf' => 'required|numeric|max:15',
            'cliente.telefone' => 'required|max:11',
            'cliente.agencia' => 'integer',
            'cliente.conta' => 'numeric',
			'tipo_contrato_id' =>  'integer' ,
			'convenio_id' =>  'integer' ,
			'prazo' =>  'integer' ,
			'valor_contratado' =>  'required|numeric' ,
			'data_contratado' =>  'serbinario_date_format:"d/m/Y"' ,
			'status_chamada' =>  'integer|max:1' ,
			'codigo_transacao' =>  'required|integer' ,
			'data_prox_chamada' =>  'serbinario_date_format:"d/m/Y"' ,*/

        ],
        ValidatorInterface::RULE_UPDATE => [],
   ];

}

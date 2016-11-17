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

            'name' => 'required|serbinario_alpha_space|max:100',
            'cpf' => 'required|cpf_br|max:15|unique:clientes,cpf',
            'telefones' => 'required|max:11',
            'agencia' => 'integer',
            'conta' => 'numeric',
			'tipo_contrato_id' =>  'integer' ,
			'convenio_id' =>  'integer' ,
			'prazo' =>  'integer' ,
			'valor_contratado' =>  'required|numeric' ,
			'data_contratado' =>  'serbinario_date_format:"d/m/Y"' ,
			'status_chamada' =>  'integer|max:1' ,
			'codigo_transacao' =>  'unique:chamadas,codigo_transacao' ,
			'data_prox_chamada' =>  'serbinario_date_format:"d/m/Y"' ,

        ],
        ValidatorInterface::RULE_UPDATE => [

            'name' => 'required|serbinario_alpha_space|max:100',
            'cpf' => 'required|cpf_br|max:15|unique:clientes,cpf',
            'telefones' => 'required|max:11',
            'agencia' => 'integer',
            'conta' => 'numeric',
            'tipo_contrato_id' =>  'integer' ,
            'convenio_id' =>  'integer' ,
            'prazo' =>  'integer' ,
            'valor_contratado' =>  'required|numeric' ,
            'data_contratado' =>  'serbinario_date_format:"d/m/Y"' ,
            'status_chamada' =>  'integer|max:1' ,
            'codigo_transacao' =>  'required|integer' ,
            'data_prox_chamada' =>  'serbinario_date_format:"d/m/Y"' ,

        ],
   ];

}

<?php

namespace MbCreditoCBO\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ContratoValidator extends LaravelValidator
{
    protected $messages   = [
    ];

    protected $attributes = [
    ];

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [

            'name' => 'required|serbinario_alpha_space|max:100',
            'cpf' => 'required|cpf_br|max:15', //unique:clientes,cpf|
            'agencia' => 'integer',
            'conta' => 'required|between:4,15|bank_br',
            'status_chamada' =>  'integer|max:1' ,
            'contrato.tipo_contrato_id' =>  'required|integer' ,
            'contrato.convenio_id' =>  'required|integer' ,
            'contrato.prazo' =>  'required|integer' ,
            'contrato.valor_contratado' =>  'required|decimal' ,
            'contrato.data_contratado' =>  'required|serbinario_date_format:"d/m/Y"' ,
            'contrato.codigo_transacao' =>  'required|unique:chamadas,codigo_transacao|integer' ,
            'contrato.data_prox_chamada' =>  'required|serbinario_date_format:"d/m/Y"'

       ],
        ValidatorInterface::RULE_UPDATE => [

            'name' => 'required|serbinario_alpha_space|max:100',
            'cpf' => 'required|cpf_br|max:15', //unique:clientes,cpf||
            'agencia' => 'integer',
            'conta' => 'required|between:4,15|bank_br',
            'status_chamada' =>  'integer|max:1' ,
            'contrato.tipo_contrato_id' =>  'required|integer' ,
            'contrato.convenio_id' =>  'required|integer' ,
            'contrato.prazo' =>  'required|integer' ,
            'contrato.valor_contratado' =>  'required|decimal' ,
            'contrato.data_contratado' =>  'required|serbinario_date_format:"d/m/Y"' ,
            'contrato.codigo_transacao' =>  'required|integer' , //unique:chamadas,codigo_transacao
            'contrato.data_prox_chamada' =>  'required|serbinario_date_format:"d/m/Y"'

        ],
   ];

}

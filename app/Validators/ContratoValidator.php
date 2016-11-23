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
            'cpf' => 'required|cpf_br|max:15', //unique:clientes,cpf||
            //'telefones' => 'required|max:11',
            'agencia' => 'integer',
            'conta' => 'bank_br',
            'status_chamada' =>  'integer|max:1' ,

            'contrato.tipo_contrato_id' =>  'integer' ,
            'contrato.convenio_id' =>  'integer' ,
            'contrato.prazo' =>  'integer' ,
            'contrato.valor_contratado' =>  'required|decimal' ,
            'contrato.data_contratado' =>  'required|serbinario_date_format:"d/m/Y"' ,
            'contrato.codigo_transacao' =>  'required|integer' , //unique:chamadas,codigo_transacao
            'contrato.data_prox_chamada' =>  'required|serbinario_date_format:"d/m/Y"' ,

       ],
        ValidatorInterface::RULE_UPDATE => [

            /*'name' => 'required|serbinario_alpha_space|max:100',
            'cpf' => 'required|cpf_br|max:15|unique:clientes,cpf',
//            'telefones' => 'required|max:11',
            'agencia' => 'integer',
            'conta' => 'bank_br',
            'contrato.tipo_contrato_id' =>  'integer' ,
            'contrato.convenio_id' =>  'integer' ,
            'contrato.prazo' =>  'integer' ,
            'contrato.valor_contratado' =>  'required' ,
            'contrato.data_contratado' =>  'required|serbinario_date_format:"d/m/Y"' ,
            'status_chamada' =>  'integer|max:1' ,
            'contrato.codigo_transacao' =>  'required|integer|unique:chamadas,codigo_transacao' ,
            'contrato.data_prox_chamada' =>  'required|serbinario_date_format:"d/m/Y"' ,*/

        ],
   ];

}

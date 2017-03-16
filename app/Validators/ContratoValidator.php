<?php

namespace MbCreditoCBO\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ContratoValidator extends LaravelValidator
{
    protected $messages   = [
        'required' => ':attribute é requerido',
        'between' => ':attribute deve conter no mínimo :min e no máximo :max caracteres',
        'serbinario_alpha_space' => ':attribute deve conter apenas letras e espaços',
        'bank_br' => ':attribute deve conter apenas números e no máximo um hífen (-)',
        'max' => ':attribute deve conter no máximo :size caracteres',
        'cpf_br' => ':attribute deve conter apenas números',
        'integer' => ':attribute deve conter apenas número(s) inteiro(s)',
        'unique' => ':attribute dado já cadastrado, por favor, informe outro',
        'serbinario_date_format:"d/m/Y"' => ':attribute deve estar disposto como: dia/mês/ano',
        'decimal' => ':attribute deve conter um valor acima de 0, máximo uma vírgula e sem pontos'
    ];

    protected $attributes =[
        'name' => 'Nome',
        'cpf' =>  'Cpf',
        'agencia' => 'Agência',
        'conta' => 'Conta',
        'contrato.tipo_contrato_id' => 'Tipo de Crédito',
        'contrato.convenio_id' => 'Convênio',
        'contrato.prazo' => 'Prazo',
        'contrato.valor_contratado' => 'Valor Contratado',
        'contrato.data_contratado' => 'Data da Contratação',
        'contrato.codigo_transacao' => 'Nº do Contrato',
        'contrato.data_prox_chamada' => 'Data próx. Ligação'
    ];

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [

            'name' => 'required|serbinario_alpha_space|between:0,100',
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
            /*'status_chamada' =>  'integer|max:1' ,
            'contrato.tipo_contrato_id' =>  'required|integer' ,
            'contrato.convenio_id' =>  'required|integer' ,
            'contrato.prazo' =>  'required|integer' ,
            'contrato.valor_contratado' =>  'required|decimal' ,
            'contrato.data_contratado' =>  'required|serbinario_date_format:"d/m/Y"' ,
            'contrato.codigo_transacao' =>  'required|integer' , //unique:chamadas,codigo_transacao
            'contrato.data_prox_chamada' =>  'required|serbinario_date_format:"d/m/Y"'*/

        ],
   ];
}
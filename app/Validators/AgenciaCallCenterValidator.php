<?php

namespace MbCreditoCBO\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class AgenciaCallCenterValidator extends LaravelValidator
{
    protected $messages   = [
        'required' => ':attribute é requerido',
        'between' => ':attribute deve conter no mínimo :min e no máximo :max caracteres',
        'serbinario_alpha_space' => ':attribute deve conter apenas letras e espaços',
        'bank_br' => ':attribute deve conter apenas números e hífen'
    ];

    protected $attributes =[
        'numero_agencia' => 'Número da agência',
        'nome_agencia' =>  'Nome da agência'
    ];

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
			'numero_agencia' =>  'required|between:4,15|bank_br' ,
			'nome_agencia' =>  'required|serbinario_alpha_space'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'numero_agencia' =>  'required|between:4,15|bank_br' ,
            'nome_agencia' =>  'required|serbinario_alpha_space'
        ],
   ];

}

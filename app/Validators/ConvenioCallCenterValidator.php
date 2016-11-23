<?php

namespace MbCreditoCBO\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ConvenioCallCenterValidator extends LaravelValidator
{
    protected $messages   = [
        'required' => ':attribute é requerido',
        'serbinario_alpha_space' => ':attribute deve conter apenas letras e espaços',
        'max' => ':attribute deve conter no máximo :size caracteres'
    ];

    protected $attributes =[
        'nome_convenio' => 'Nome do Convênio'
    ];

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
			'nome_convenio' =>  'required|serbinario_alpha_space|max:100'

        ],
        ValidatorInterface::RULE_UPDATE => [
            'nome_convenio' =>  'required|serbinario_alpha_space|max:100'

        ],
   ];

}

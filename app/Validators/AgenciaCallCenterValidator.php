<?php

namespace MbCreditoCBO\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class AgenciaCallCenterValidator extends LaravelValidator
{
    protected $attribute =[

    ];

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
			'numero_agencia' =>  'required|bank_br' ,
			'nome_agencia' =>  'required|serbinario_alpha_space'
        ],
        ValidatorInterface::RULE_UPDATE => [
            /*'numero_agencia' =>  'required|bank_br' ,
            'nome_agencia' =>  'required|serbinario_alpha_space'*/
        ],
   ];

}

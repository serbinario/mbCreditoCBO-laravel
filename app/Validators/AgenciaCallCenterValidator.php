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
            
			'numero_agencia' =>  'required|numeric' ,
			'nome_agencia' =>  'required' , //alpha space

        ],
        ValidatorInterface::RULE_UPDATE => [
            'numero_agencia' =>  'required|numeric' ,
            'nome_agencia' =>  'required' , //alpha space
        ],
   ];

}

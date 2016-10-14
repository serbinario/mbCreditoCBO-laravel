<?php

namespace MbCreditoCBO\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class AgenciaCallCenterValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            
			'numero_agencia' =>  '' ,
			'nome_agencia' =>  '' ,

        ],
        ValidatorInterface::RULE_UPDATE => [],
   ];

}

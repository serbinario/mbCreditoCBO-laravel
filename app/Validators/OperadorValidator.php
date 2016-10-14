<?php

namespace MbCreditoCBO\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class OperadorValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            
			'id_operadores' =>  '' ,
			'cod_operadores' =>  '' ,
			'nome_operadores' =>  '' ,
			'status_operadores' =>  '' ,

        ],
        ValidatorInterface::RULE_UPDATE => [],
   ];

}

<?php

namespace MbCreditoCBO\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class UserValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            
			'id_operadores' =>  '' ,
			'username' =>  '' ,
			'password' =>  '' ,
			'salt' =>  '' ,
			'email' =>  '' ,
			'is_active' =>  '' ,

        ],
        ValidatorInterface::RULE_UPDATE => [],
   ];

}

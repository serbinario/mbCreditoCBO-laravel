<?php

namespace MbCreditoCBO\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class UsuarioValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            
			'id_operadores' =>  '' ,
			'username' =>  '' ,
			'password' =>  '' ,
			'salt' =>  '' ,
			'email' =>  '' ,
			'active' =>  '' ,

        ],
        ValidatorInterface::RULE_UPDATE => [],
   ];

}

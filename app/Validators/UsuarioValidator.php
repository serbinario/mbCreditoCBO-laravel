<?php

namespace MbCreditoCBO\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class UsuarioValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [

			/*'username' =>  'required|max:8' ,
			'password' =>  'required|' ,
			'salt' =>  '' ,
			'email' =>  '' ,
			'active' =>  'integer|max:1' ,
            'users.users_has_roles.role_id' => 'required'*/

        ],
        ValidatorInterface::RULE_UPDATE => [],
   ];

}

<?php

namespace MbCreditoCBO\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class UsuarioValidator extends LaravelValidator
{
    use TraitValidation;

    protected $messages   = [
        'required' => ':attribute é requerido',
        'max' => ':attribute deve conter no máximo :size caracteres',
        'integer' => ':attribute deve conter apenas número(s) inteiro(s)',
        'chave_j' => ':attribute com 7 digitos, precedido da letra \'J\'',
        'email' => ':attribute deve conter um e-mail válido (nome@dominio.com.br)'
    ];

    protected $attributes =[
        'username' => 'Login',
        'password' =>  'Senha',
        'email' => 'E-mail',
        'users.users_has_roles.role_id' => 'Nível de permissão'
    ];

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [

			//'username' =>  'required|chave_j' ,
			//'password' =>  'required|max:60' ,
			'salt' =>  '' ,
			'email' =>  'email' ,
			'active' =>  'integer|max:1' ,
//            'users.users_has_roles.role_id' => 'required'
        ],

        ValidatorInterface::RULE_UPDATE => [

            //'username' =>  'required|chave_j' ,
            //'password' =>  'required|max:60' ,
            'salt' =>  '' ,
            'email' =>  'email' ,
            'active' =>  'integer|max:1' ,
//            'users.users_has_roles.role_id' => 'required'
        ],
   ];

}

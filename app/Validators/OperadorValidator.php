<?php

namespace MbCreditoCBO\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class OperadorValidator extends LaravelValidator
{

    protected $attribute =[
        'cod_operadores' => 'Chave J',
        'nome_operadores' =>  'Nome'
    ];

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
			'cod_operadores' =>  'required|chave_j',
			'nome_operadores' =>  'required|max:200|serbinario_alpha_space',
			'status_operadores' =>  'integer|max:1' ,
        ],
        ValidatorInterface::RULE_UPDATE => [
            'cod_operadores' =>  'required|chave_j',
            'nome_operadores' =>  'required|max:200|serbinario_alpha_space',
            'status_operadores' =>  'integer|max:1' ,
        ],
   ];

}

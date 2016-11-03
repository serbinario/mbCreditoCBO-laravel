<?php

namespace MbCreditoCBO\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class OperadorValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [

			'cod_operadores' =>  'digits_between:1,8' ,
			'nome_operadores' =>  'required|max:200', //Adicionar alpha_space
			'status_operadores' =>  'integer|max:1' ,

        ],
        ValidatorInterface::RULE_UPDATE => [],
   ];

}

<?php

namespace MbCreditoCBO\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class OperadorValidator extends LaravelValidator
{
    use TraitValidation;

    protected $messages   = [
        'required' => ':attribute é requerido',
        'chave_j' => ':attribute com 7 digitos, precedido da letra \'J\'',
        'between' => ':attribute deve conter no mínimo :min e no máximo :max caracteres',
        'serbinario_alpha_space' => ':attribute deve conter apenas letras e espaços',
        'unique' => ':attribute já se encontra cadastrado'
    ];

    protected $attributes =[
        'cod_operadores' => 'Chave J',
        'nome_operadores' =>  'Nome'
    ];

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
//			'cod_operadores' =>  'required|chave_j|unique:operadores,cod_operadores',
			'nome_operadores' =>  'required|between:0,200|serbinario_alpha_space',
			'status_operadores' =>  'integer|max:1' ,
        ],
        ValidatorInterface::RULE_UPDATE => [
            'cod_operadores' =>  'required|chave_j',
            'nome_operadores' =>  'required|between:0,200|serbinario_alpha_space',
            'status_operadores' =>  'integer|max:1' ,
        ],
   ];

}

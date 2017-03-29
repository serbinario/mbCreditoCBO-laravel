<?php

namespace MbCreditoCBO\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ClienteValidator extends LaravelValidator
{
    use TraitValidation;

    protected $messages = [

    ];

    protected $attributes =[

    ];

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [

        ],

        ValidatorInterface::RULE_UPDATE => [

        ],
   ];

}

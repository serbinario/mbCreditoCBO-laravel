<?php

namespace MbCreditoCBO\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class TelefoneValidator extends LaravelValidator
{
    use TraitValidation;

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [

        ],
        ValidatorInterface::RULE_UPDATE => [],
   ];

}

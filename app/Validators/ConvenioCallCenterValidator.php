<?php

namespace MbCreditoCBO\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ConvenioCallCenterValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
			'nome_convenio' =>  'required|serbinario_alpha_space|max:100'

        ],
        ValidatorInterface::RULE_UPDATE => [
            'nome_convenio' =>  'required|serbinario_alpha_space|max:100'

        ],
   ];

}

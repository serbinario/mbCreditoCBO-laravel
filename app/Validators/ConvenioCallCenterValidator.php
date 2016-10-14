<?php

namespace MbCreditoCBO\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ConvenioCallCenterValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            
			'nome_convenio' =>  '' ,

        ],
        ValidatorInterface::RULE_UPDATE => [],
   ];

}

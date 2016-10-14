<?php

namespace MbCreditoCBO\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ContratoValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            
			'cliente_id' =>  '' ,
			'tipo_contrato_id' =>  '' ,
			'convenio_id' =>  '' ,
			'prazo' =>  '' ,
			'valor_contratado' =>  '' ,
			'data_contratado' =>  '' ,
			'status_chamada' =>  '' ,
			'codigo_transacao' =>  '' ,
			'data_prox_chamada' =>  '' ,

        ],
        ValidatorInterface::RULE_UPDATE => [],
   ];

}

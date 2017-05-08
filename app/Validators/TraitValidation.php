<?php

namespace MbCreditoCBO\Validators;

trait TraitValidation
{
    /**
     * Pass the data and the rules to the validator
     *
     * @param string $action
     * @return bool
     */
    public function passes($action = null)
    {
        $rules     = $this->getRules($action);
        $messages   = $this->messages;
        $attributes = $this->attributes;
        $validator  = $this->validator->make($this->data, $rules, $messages, $attributes);

        if( $validator->fails() )
        {
            $this->errors = $validator->messages();
            return false;
        }

        return true;
    }
}
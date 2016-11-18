<?php

namespace MbCreditoCBO\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        # Validator para espaços em branco
        Validator::extend('serbinario_alpha_space', function($attribute, $value, $formats, $validator) {
            #expressão regular
            $pattern = "/^[\pL\s\-]+$/u";

            #Validando pela expressão regular
            if (\preg_match($pattern, $value)) {
                return true;
            }

            #retorno
            return false;
        });

        # Validator chave J
        Validator::extend('chave_j', function($attribute, $value, $formats, $validator) {
            #expressão regular
            $pattern = "/^[J][0-9]{7}$/";

            #Validando pela expressão regular
            if (\preg_match($pattern, $value)) {
                return true;
            }

            #retorno
            return false;
        });

        # Validator conta bancaria
        Validator::extend('bank_br', function($attribute, $value, $formats, $validator) {
            #expressão regular
            $pattern = "/^[0-9]+[-]?[0-9]+$/";

            #Validando pela expressão regular
            if (\preg_match($pattern, $value)) {
                return true;
            }

            #retorno
            return false;
        });

        # Validator cpf Brasil
        Validator::extend('cpf_br', function($attribute, $value, $formats, $validator) {
            #expressão regular
            $pattern = "/^([0-9]{3}\.?[0-9]{3}\.?[0-9]{3}\-?[0-9]{2}|[0-9]{2}\.?[0-9]{3}\.?[0-9]{3}\/?[0-9]{4}\-?[0-9]{2})$/";

            #Validando pela expressão regular
            if (\preg_match($pattern, $value)) {
                return true;
            }

            #retorno
            return false;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
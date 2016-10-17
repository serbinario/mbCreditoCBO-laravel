<?php

namespace MbCreditoCBO\Entities;

use Illuminate\Support\Facades\Auth;

class PasswordGrantVerifier
{
    public function verify($username, $password)
    {
        $credentials = [
            'username'    => $username,
            'password' => $password,
        ];

//        if (Auth::attempt(['username' => $username, 'password' => $password, 'active' => 1])){
//            return Auth::user()->id;
//        }

        if (Auth::once($credentials)) {
            return Auth::user()->id;
        }

        return false;
    }

}
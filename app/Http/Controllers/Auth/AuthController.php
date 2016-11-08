<?php

namespace MbCreditoCBO\Http\Controllers\Auth;

use MbCreditoCBO\User;
use Validator;
use MbCreditoCBO\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * @var string
     *
     * Atributo que armazena o caminho de redirecionamento
     * quando o usuário tiver sucesso ao se autenticar
     */
    protected $redirectPath = '/index';

    /**
     * @var string
     *
     * Atributo que armazena o caminho de redirecionamento
     * quando o usuário "deslogar"
     */
    protected $redirectAfterLogout = '/auth/login';

    /**
     * @var string
     */
    protected $username = 'username';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
//            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            //'id_operadores' => $data['id_operadores']
            /*'opcaoOperador' => $data['permissao'],
            'opcaoAdmin' => $data['permissao'],
            'opcaoGerente' => $data['permissao']*/
        ]);
    }
}

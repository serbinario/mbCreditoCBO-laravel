<?php

namespace MbCreditoCBO\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
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
    protected $redirectPath = '/dashboard';

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
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function getCredentials($request)
    {
        $credentials = $request->only($this->loginUsername(), 'password');

        return array_add($credentials, 'active', '1');
    }


    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        # Recuperando a coluna de permissões
        $arrayRole = array_column(Auth::user()->roles->toArray(), 'role');

        # Verificando a permissão
        if(!in_array('ROLE_ADMIN', $arrayRole) && !in_array('ROLE_GERENTE', $arrayRole)) {
            $this->redirectPath = 'contrato/index';
        }

        if (property_exists($this, 'redirectPath')) {
            return $this->redirectPath;
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }
}

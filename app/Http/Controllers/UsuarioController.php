<?php

namespace MbCreditoCBO\Http\Controllers;

use Illuminate\Http\Request;

use MbCreditoCBO\Http\Requests;
use MbCreditoCBO\Services\UsuarioService;
use Yajra\Datatables\Datatables;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;
use MbCreditoCBO\Validators\UserHoleValidator;
use MbCreditoCBO\Validators\UsuarioValidator;

class UsuarioController extends Controller
{
    /**
    * @var UsuarioService
    */
    private $service;

    /**
    * @var UsuarioValidator
    */
    private $validator;

    /**
    * @var array
    */
    private $loadFields = [
        'Operador|resolvedName',

    ];

    /**
    * @param UsuarioService $service
    * @param UsuarioValidator $validator
    */
    public function __construct(UsuarioService $service, UsuarioValidator $validator)
    {
        $this->service   =  $service;
        $this->validator =  $validator;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('usuario.index');
    }

    /**
     * @return mixed
     */
    public function grid()
    {
        #Criando a consulta
        $rows = \DB::table('users')
            ->join('operadores', 'operadores.id_operadores', '=', 'users.id_operadores')
            ->select(['id', 'users.username', 'operadores.nome_operadores', 'users.email']);

        #Editando a grid
        return Datatables::of($rows)->addColumn('action', function ($row) {
            return '<a href="edit/'.$row->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Editar</a>';
        })->make(true);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        #Carregando os dados para o cadastro
        $loadFields = $this->service->load($this->loadFields);

        #Retorno para view
        return view('usuario.create', compact('loadFields'));
    }

    /**
     * @param Request $request
     * @return $this|array|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try {
            #Recuperando os dados da requisição
            $data = $request->all();
//        dd($data);
            #Validando a requisição
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);

            #Executando a ação
            $this->service->store($data);

            #Retorno para a view
            return redirect()->back()->with("message", "Cadastro realizado com sucesso!");
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($this->validator->errors())->withInput();
        } catch (\Throwable $e) {print_r($e->getMessage()); exit;
            return redirect()->back()->with('message', $e->getMessage());
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit($id)
    {
        try {
            #Recuperando o usuário
            $model = $this->service->find($id);

            $roleOperador = $model->roles->filter(function ($role) {
                return $role->id == 1;
            });

            $roleAdmin = $model->roles->filter(function ($role) {
                return $role->id == 2;
            });

            $roleGerente = $model->roles->filter(function ($role) {
                return $role->id == 3;
            });

            $rolePermission = [
                'roleOperador' => count($roleOperador) > 0 ? true : false,
                'roleAdmin' => count($roleAdmin) > 0 ? true : false,
                'roleGerente' => count($roleGerente) > 0 ? true : false
            ];

            #Tratando as datas
           // $aluno = $this->service->getAlunoWithDateFormatPtBr($aluno);

            #Carregando os dados para o cadastro
            $loadFields = $this->service->load($this->loadFields);

            #retorno para view
            return view('usuario.edit', compact('model', 'loadFields', 'rolePermission'));
        } catch (\Throwable $e) {dd($e);
            return redirect()->back()->with('message', $e->getMessage());
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        try {
            #Recuperando os dados da requisição
            $data = $request->all();

            #Validando a requisição
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);

            #Executando a ação
            $this->service->update($data, $id);

            #Retorno para a view
            return redirect()->back()->with("message", "Alteração realizada com sucesso!");
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($this->validator->errors())->withInput();
        } catch (\Throwable $e) { dd($e);
            return redirect()->back()->with('message', $e->getMessage());
        }
    }

    public function dadosUsuario()
    {
        $usuario = \DB::table('operadores')
            ->join   ('users', 'users.id', '=', 'users.id_operadores')
            ->select (
                'operadores.id',
                'operadores.nome_operadores'
            );

        return view('menu', compact('usuario'));
    }

}

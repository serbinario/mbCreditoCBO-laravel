<?php

namespace MbCreditoCBO\Http\Controllers;

use Illuminate\Http\Request;

use MbCreditoCBO\Http\Requests;
use Illuminate\Http\Response;
use MbCreditoCBO\Repositories\OperadorRepository;
use MbCreditoCBO\Services\OperadorService;
use MbCreditoCBO\Validators\OperadorValidator;
use Yajra\Datatables\Datatables;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;

class OperadorController extends Controller
{
    /**
    * @var OperadorService
    */
    private $service;

    /**
    * @var OperadorValidator
    */
    private $validator;

    /**
    * @var array
    */
    private $loadFields = [];

    /**
    * @param OperadorService $service
    * @param OperadorValidator $validator
    */
    public function __construct(OperadorService $service, OperadorValidator $validator, OperadorRepository $operadorRepository)
    {
        $this->service   =  $service;
        $this->validator =  $validator;
        $this->repository = $operadorRepository;
    }

    /*
    public function novoMenu()
    {
        return view ('novoMenu');
    }

    public function novoCreate()
    {
        return view ('operador.novoCreate');
    }
     */

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('operador.index');
    }

    /**
     * @return mixed
     */
    public function grid()
    {
        #Criando a consulta
        $rows = \DB::table('operadores')->select(['id_operadores', 'cod_operadores', 'nome_operadores']);

        #Editando a grid
        return Datatables::of($rows)->addColumn('action', function ($row) {
            return '<a href="edit/'.$row->id_operadores.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Editar</a>';
        })->make(true);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('operador.create');
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
            #Buscando operador
            $model = $this->service->find($id);

            #Carregando os dados para o cadastro
            $loadFields = $this->service->load($this->loadFields);

            #retorno para view
            return view('operador.edit', compact('model', 'loadFields'));
        } catch (\Throwable $e) {dd($e);
            return redirect()->back()->with('message', $e->getMessage());
        }
    }

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     * curl -i -X DELETE localhost:8000/api/v1/operador/2
     */
    public function destroy($id)
    {
        try {
            $deleted = $this->repository->delete($id);

            return response()->json(['message' => 'Pessoa deleted.', 'deleted' => $deleted]);
        } catch (\Throwable $e) {
            return response()->json(['error'   => true,'message' => $e->getMessage()]);
        }
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function searchChaveJ(Request $request)
    {
        try {
            #Declaração de variável de uso
            $result = false;
            #Dados vindo na requisição
            $dados = $request->all();

            #
            if (empty($dados['idModel'])) {
                #Consultando
                $operador = \DB::table('operadores')
                    ->select([
                        'operadores.cod_operadores'
                    ])
                    ->where('operadores.cod_operadores', $dados['value'])
                    ->get();

            } else {
                #Consultando
                $operador = \DB::table('operadores')
                    ->select([
                        'operadores.id_operadores',
                        'operadores.cod_operadores'
                    ])
                    ->where('operadores.id_operadores', '!=' ,$dados['idModel'])
                    ->where('operadores.cod_operadores', $dados['value'])
                    ->get();
            }

            if (count($operador)) {
                $result = true;
            }

            #retorno para view
            return \Illuminate\Support\Facades\Response::json(['success' => $result]);
        } catch (\Throwable $e) {
            return \Illuminate\Support\Facades\Response::json(['success' => false,'msg' => $e->getMessage()]);
        }
    }
}
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

class Operador2Controller extends Controller
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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
//    public function index()
//    {
//        return view('operador.index');
//    }
    public function index()
    {
        try {
            # Recuperando todas as pessoas
            $operadores = $this->repository->all();

            # Retorno Json
            return response()->json(['data' => $operadores]);
        } catch (\Throwable $e) {
            return response()->json(['error'   => true,'message' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $operadores = $this->repository->find($id);

            return response()->json(['data' => $operadores]);
        } catch (\Throwable $e) {
            return response()->json(['error'   => true,'message' => $e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PessoaCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PessoaCreateRequest $request)
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $operadores = $this->repository->create($request->all());

            $response = [
                'message' => 'Pessoa created.',
                'data'    => $operadores->toArray(),
            ];

            return response()->json($response);
        } catch (ValidatorException $e) {
            return response()->json(['error'   => true,'message' => $e->getMessageBag()]);
        } catch (\Throwable $e) {
            return response()->json(['error'   => true,'message' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PessoaUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     * curl -i -X PUT --user seconduser:second_password -d 'url=http://yahoo.com' localhost:8000/l4api/publi
     */
    public function update(PessoaUpdateRequest $request, $id)
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $pessoa = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'Pessoa updated.',
                'data'    => $pessoa->toArray(),
            ];

            return response()->json($response);
        } catch (ValidatorException $e) {
            return response()->json(['error'   => true,'message' => $e->getMessageBag()]);
        } catch (\Throwable $e) {
            return response()->json(['error'   => true,'message' => $e->getMessage()]);
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
     * @return mixed
     */
    /*public function grid()
    {
        #Criando a consulta
        $rows = \DB::table('operadores')->select(['id_operadores', 'cod_operadores', 'nome_operadores']);

        #Editando a grid
        return Datatables::of($rows)->addColumn('action', function ($row) {
            return '<a href="edit/'.$row->id_operadores.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Editar</a>';
        })->make(true);
    }*/

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    /*public function create()
    {
//    dd('aa');
        return view('operador.create');
    }*/

    /**
     * @param Request $request
     * @return $this|array|\Illuminate\Http\RedirectResponse
     */
    /*public function store(Request $request)
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
    }*/

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
   /* public function edit($id_operadores)
    {
        try {
            #Recuperando a empresa
            $model = $this->service->find($id_operadores);

            #Tratando as datas
            //$aluno = $this->service->getAlunoWithDateFormatPtBr($aluno);

            #Carregando os dados para o cadastro
            $loadFields = $this->service->load($this->loadFields);

            #retorno para view
            return view('operador.edit', compact('model', 'loadFields'));
        } catch (\Throwable $e) {dd($e);
            return redirect()->back()->with('message', $e->getMessage());
        }
    }*/

    /**
     * @param Request $request
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
   /* public function update(Request $request, $id_operadores)
    {
        try {
            #Recuperando os dados da requisição
            $data = $request->all();

            #Validando a requisição
            //$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);

            #Executando a ação
            $this->service->update($data, $id_operadores);

            #Retorno para a view
            return redirect()->back()->with("message", "Alteração realizada com sucesso!");
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($this->validator->errors())->withInput();
        } catch (\Throwable $e) { dd($e);
            return redirect()->back()->with('message', $e->getMessage());
        }
    }*/

    /**
     * @param Response $response
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function getAgentes(Response $response)
    {
        try {
            #retornando todos os registros
            $agente = $this->repository->findWhere(['id_operadores' => 2]);

            #retorno para view
            return response()->json(['dados' => $agente]);
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($this->validator->errors())->withInput();
        } catch (\Throwable $e) { dd($e);
            return redirect()->back()->with('message', $e->getMessage());
        }
    }

}

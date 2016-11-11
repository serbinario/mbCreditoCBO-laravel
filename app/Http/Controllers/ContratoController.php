<?php

namespace MbCreditoCBO\Http\Controllers;

use Illuminate\Http\Request;

use MbCreditoCBO\Http\Requests;
use MbCreditoCBO\Services\ContratoService;
use Yajra\Datatables\Datatables;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;
use MbCreditoCBO\Validators\ContratoValidator;

class ContratoController extends Controller
{
    /**
    * @var ContratoService
    */
    private $service;

    /**
    * @var ContratoValidator
    */
    private $validator;

    /**
    * @var array
    */
    private $loadFields = [
        'ConvenioCallCenter|resolvedName',
        'TipoContrato|resolvedName',
        'Contrato|resolvedName',
        'AgenciaCallCenter|resolvedName'
    ];

    /**
    * @param ContratoService $service
    * @param ContratoValidator $validator
    */
    public function __construct(ContratoService $service, ContratoValidator $validator)
    {
        $this->service   =  $service;
        $this->validator =  $validator;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('contrato.index');
    }

    /**
     * @return mixed
     */
    public function grid()
    {
        #Criando a consulta
        $rows = \DB::table('chamadas')
            ->join('clientes', 'clientes.id', '=', 'chamadas.cliente_id')
            ->join('agencias_callcenter as agencias', 'agencias.id', '=', 'clientes.agencia_id')
            ->leftJoin('telefones', 'telefones.cliente_id', '=', 'clientes.id')
            ->select
            ([
                'chamadas.id',
                'clientes.name',
                'clientes.cpf',
                'agencias.numero_agencia',
                'clientes.conta',
                'telefones.telefone'
            ]);

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
        return view('contrato.create', compact('loadFields'));
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
        } catch (\Throwable $e) {
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
            #Recuperando a empresa
            $model = $this->service->find($id);

            #Tratando as datas
           // $aluno = $this->service->getAlunoWithDateFormatPtBr($aluno);

            #Carregando os dados para o cadastro
            $loadFields = $this->service->load($this->loadFields);

            #retorno para view
            return view('contrato.edit', compact('model', 'loadFields'));
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
            //$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);

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
     * @param $clienteCpf
     * @return mixed
     */
    public function searchCliente($cpfCliente)
    {
        try{
            #Consultado
            $cliente = \DB::table('telefones')
                ->join ('clientes', 'clientes.id', '=', 'telefones.cliente_id')
                ->join ('agencias_callcenter as agencia', 'agencia.id', '=', 'clientes.agencia_id')
                ->select([
                    'clientes.id as idCliente',
                    'clientes.name',
                    'clientes.cpf',
                    'clientes.conta',
                    'agencia.numero_agencia',
                    'agencia.id',
                    'telefones.telefone as numero'
                ])
                ->where('clientes.cpf', $cpfCliente)
                ->get();

            #retorno para view
            return \Illuminate\Support\Facades\Response::json(['success' => true, 'dados' => $cliente]);
        } catch (\Throwable $e) {
            return \Illuminate\Support\Facades\Response::json(['success' => false,'msg' => $e->getMessage()]);
        }
    }

    /**
     * @param $numeroContrato
     * @return mixed
     */
    public function searchContrato($numeroContrato)
    {
        try{
            #Consultando
            $contrato = \DB::table('chamadas')
                ->select('chamadas.id')
                ->where('codigo_transacao', $numeroContrato)
                ->get();

            #retorno para view
            return \Illuminate\Support\Facades\Response::json(['success' => true, 'dados' => $contrato]);
        } catch (\Throwable $e) {
            return \Illuminate\Support\Facades\Response::json(['success' => false,'msg' => $e->getMessage()]);
        }
    }

}

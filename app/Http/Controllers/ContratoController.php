<?php

namespace MbCreditoCBO\Http\Controllers;

use Illuminate\Http\Request;

use MbCreditoCBO\Entities\Telefone;
use MbCreditoCBO\Http\Requests;
use MbCreditoCBO\Repositories\ClienteRepository;
use MbCreditoCBO\Repositories\ContratoRepository;
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
     * @var ClienteRepository
     */
    private $clienteRepository;

    /**
     * @var ContratoRepository
     */
    private $contratoRepository;

    /**
     * ContratoController constructor.
     * @param ContratoService $service
     * @param ContratoValidator $validator
     * @param ClienteRepository $clienteRepository
     * @param ContratoRepository $contratoRepository
     */
    public function __construct(ContratoService $service,
                                ContratoValidator $validator,
                                ClienteRepository $clienteRepository,
                                ContratoRepository $contratoRepository)
    {
        $this->service   =  $service;
        $this->validator =  $validator;
        $this->clienteRepository = $clienteRepository;
        $this->contratoRepository = $contratoRepository;
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
            ->leftJoin('telefones', function ($join) {
                $join->on(
                    'telefones.id', '=',
                    \DB::raw('(SELECT telefone_atual.id FROM telefones as telefone_atual 
                        where telefone_atual.cliente_id = clientes.id ORDER BY telefone_atual.id DESC LIMIT 1)')
                );
            })
            ->select
            ([
                'clientes.id as idCliente',
                'chamadas.id',
                'clientes.name',
                'clientes.cpf',
                'agencias.numero_agencia',
                'clientes.conta',
                'telefones.telefone'
            ]);

        #Editando a grid
        return Datatables::of($rows)
            ->addColumn('contratos', function ($row) {
                return $this->contratoRepository->with([
                    'tipoContrato',
                    'convenio'
                ])->findByField(['cliente_id' => $row->idCliente]);
            })
            ->addColumn('action', function ($row) {
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
     * @param $cpfCliente
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

    ### Métodos de GERENCIAMENTO DE TELEFONES ###

    /**
     * @param int $idClient
     * @return mixed
     */
    public function gridPhones(int $idClient)
    {
        #Criando a consulta
        $rows = \DB::table('telefones')
            ->join('clientes', 'clientes.id', '=', 'telefones.cliente_id')
            ->where('clientes.id', $idClient)
            ->select([
                'telefones.id',
                'telefones.telefone'
            ]);

        #Editando a grid
        return Datatables::of($rows)
            ->addColumn('action', function ($row) {
                return '';
            })
            ->make(true);
    }

    /**
     * @param Request $request
     * @param int $idClient
     * @return mixed
     */
    public function storePhone(Request $request, int $idClient)
    {
        try{
            # Recuperando o cliente
            $cliente = $this->clienteRepository->find($idClient);
            
            # Adicionando o telefone
            $cliente->telefones()->saveMany([new Telefone(['telefone' => $request->get('telefone')])]);

            #retorno para view
            return \Illuminate\Support\Facades\Response::json(['success' => true]);
        } catch (\Throwable $e) {
            return \Illuminate\Support\Facades\Response::json(['success' => false,'msg' => $e->getMessage()]);
        }
    }
}

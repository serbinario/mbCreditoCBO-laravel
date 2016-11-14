<?php

namespace MbCreditoCBO\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
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
        # Dados de preenchimento para o filtro da grid
        $meses = ['' => 'Selecione um mês', 1 => 'Janeiro', 2 => 'Fevereiro', 3 => 'Março', 4 => 'Abril', 5 => 'Maio',
            6 => 'Junho', 7 => 'Julho', 8 => 'Agosto', 9 => 'Setembro', 10 => 'Outubro', 11 => 'Novembro', 12 => 'Dezembro'];

        # Retorno para view
        return view('contrato.index', compact('meses'));
    }

    /**
     * @return mixed
     */
    public function grid(Request $request)
    {
        #Criando a consulta
        $rows = \DB::table('clientes')
            ->join('chamadas', 'chamadas.cliente_id', '=', 'clientes.id')
            ->join('agencias_callcenter as agencias', 'agencias.id', '=', 'clientes.agencia_id')
            ->join('users', 'users.id', '=', 'chamadas.user_id')
            ->leftJoin('telefones', function ($join) {
                $join->on(
                    'telefones.id', '=',
                    \DB::raw('(SELECT telefone_atual.id FROM telefones as telefone_atual 
                        where telefone_atual.cliente_id = clientes.id ORDER BY telefone_atual.id DESC LIMIT 1)')
                );
            })
            ->where('users.id', Auth::user()->id)
            ->orderBy('chamadas.data_contratado', 'DESC')
            ->groupBy('clientes.id')
            ->select([
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
            ->filter(function ($query) use ($request) {
                # Recuperando o usuário
                $user = Auth::user();

                # Filtrando por usuário
                if(count($user->roles->toArray()) > 0) {
                    # Recuperando a coluna de permissões
                    $arrayRole = array_column($user->roles->toArray(), 'role');

                    # Aplicando o filtro
                    if(!in_array('ROLE_ADMIN', $arrayRole) && !in_array('ROLE_GERENTE', $arrayRole)) {
                        $query->where('users.id', $user->id);
                    }
                }

                # Filtrando por mes
                if ($request->has('mes')) {
                    $query->where(\DB::raw('MONTH(chamadas.data_contratado)'), '=', $request->get('mes'));
                }
               
                # Filtrando por ranger de data
                if ($request->has('dataIni') && $request->has('dataFin')) {
                    # Convertendo as datas
                    $dataIni = \DateTime::createFromFormat('d/m/Y', $request->get('dataIni'));
                    $dataFin = \DateTime::createFromFormat('d/m/Y', $request->get('dataFin'));

                    # Validando a conversão das datas
                    if($dataIni && $dataFin) {
                        $query->whereBetween('chamadas.data_contratado',[$dataIni->format('Y-m-d'), $dataFin->format('Y-m-d')]);
                    }
                }

                # Filtrando Global
                if ($request->has('global')) {
                    # recuperando o valor da requisição
                    $search = $request->get('global');

                    #condição
                    $query->where(function ($where) use ($search) {
                        $where->orWhere('clientes.name', 'like', "%$search%")
                            ->orWhere('clientes.cpf', 'like', "%$search%")
                            ->orWhere('clientes.conta', 'like', "%$search%")
                            ->orWhere('agencias.numero_agencia', 'like', "%$search%");
                    });
                }
            })
            ->addColumn('contratos', function ($row) {
                # Retorno
                return $this->contratoRepository->with(['tipoContrato', 'convenio'])
                    ->findByField(['cliente_id' => $row->idCliente, 'user_id' =>  Auth::user()->id]);
            })
            ->addColumn('action', function ($row) {
                # Html de retorno
                $html = '';

                # Recuperando o usuário
                $user = Auth::user();

                # Filtrando por usuário
                if(count($user->roles->toArray()) > 0) {
                    # Recuperando a coluna de permissões
                    $arrayRole = array_column($user->roles->toArray(), 'role');

                    # Aplicando o filtro
                    if(!in_array('ROLE_GERENTE', $arrayRole)) {
                        $html .= '<a href="edit/'.$row->idCliente.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Editar</a>';
                        $html .= '  ';
                        $html .= '<a href="createContrato/'.$row->idCliente.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-file"></i> Novo Contrato</a>';
                    }
                }

                return $html;
        })->make(true);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        #Carregando os dados para o cadastro
        $loadFields = $this->service->load($this->loadFields);

        # Array de parcelas
        $arrayParcelas = ['' => 'Selecione uma parcela'];

        # Criando as parcelas
        for ($i = 1; $i <= 72; $i++) {
            $arrayParcelas[$i] = $i;
        }

        #Retorno para view
        return view('contrato.create', compact('loadFields', 'arrayParcelas'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function createContrato($id)
    {
        try {
            #Recuperando o contrato
            $model = $this->clienteRepository->find($id);

            #Carregando os dados para o cadastro
            $loadFields = $this->service->load($this->loadFields);

            # Array de parcelas
            $arrayParcelas = ['' => 'Selecione uma parcela'];

            # Criando as parcelas
            for ($i = 1; $i <= 72; $i++) {
                $arrayParcelas[$i] = $i;
            }

            #retorno para view
            return view('contrato.createContrato', compact('model', 'loadFields', 'arrayParcelas'));
        } catch (\Throwable $e) {
            return redirect()->back()->with('message', $e->getMessage());
        }
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
            #Recuperando o contrato
            $model = $this->clienteRepository->find($id);

            #Carregando os dados para o cadastro
            $loadFields = $this->service->load($this->loadFields);

            # Array de parcelas
            $arrayParcelas = ['' => 'Selecione uma parcela'];

            # Criando as parcelas
            for ($i = 1; $i <= 72; $i++) {
                $arrayParcelas[$i] = $i;
            }

            #retorno para view
            return view('contrato.edit', compact('model', 'loadFields','arrayParcelas'));
        } catch (\Throwable $e) {
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
            $cliente = \DB::table('clientes')
                ->join ('agencias_callcenter as agencia', 'agencia.id', '=', 'clientes.agencia_id')
                ->select([
                    'clientes.id as idCliente',
                    'clientes.name',
                    'clientes.cpf',
                    'clientes.conta',
                    'agencia.numero_agencia',
                    'agencia.id'
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

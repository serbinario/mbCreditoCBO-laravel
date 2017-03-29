<?php

namespace MbCreditoCBO\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use MbCreditoCBO\Entities\Telefone;
use MbCreditoCBO\Repositories\ClienteRepository;
use MbCreditoCBO\Repositories\ContratoRepository;
use MbCreditoCBO\Repositories\OperadorRepository;
use MbCreditoCBO\Services\ContratoService;
use Yajra\Datatables\Datatables;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;
use MbCreditoCBO\Validators\ContratoValidator;
use MbCreditoCBO\Helpers\MimeTypeHelper;

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
     * @var OperadorRepository
     */
    private $operadorRepository;

    /**
     * @var MimeTypeHelper
     */
    private $mimeTypeHelper;

    /**
     * ContratoController constructor.
     * @param ContratoService $service
     * @param ContratoValidator $validator
     * @param ClienteRepository $clienteRepository
     * @param ContratoRepository $contratoRepository
     * @param OperadorRepository $operadorRepository
     * @param MimeTypeHelper $mimeTypeHelper
     */
    public function __construct(ContratoService $service,
                                ContratoValidator $validator,
                                ClienteRepository $clienteRepository,
                                ContratoRepository $contratoRepository,
                                OperadorRepository $operadorRepository,
                                MimeTypeHelper $mimeTypeHelper)
    {
        $this->service   =  $service;
        $this->validator =  $validator;
        $this->clienteRepository = $clienteRepository;
        $this->contratoRepository = $contratoRepository;
        $this->operadorRepository = $operadorRepository;
        $this->mimeTypeHelper = $mimeTypeHelper;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        # Dados de preenchimento para o filtro da grid
        $meses = ['' => 'Selecione um mês', 1 => 'Janeiro', 2 => 'Fevereiro', 3 => 'Março', 4 => 'Abril', 5 => 'Maio',
            6 => 'Junho', 7 => 'Julho', 8 => 'Agosto', 9 => 'Setembro', 10 => 'Outubro', 11 => 'Novembro', 12 => 'Dezembro'];

        # Recuperando os agentes
        $agentes = \MbCreditoCBO\Entities\Operador::lists('nome_operadores', 'id_operadores');

        # Retorno para view
        return view('contrato.index', compact('meses', 'agentes'));
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
            ->join('operadores', 'operadores.id_operadores', '=', 'users.id_operadores')
            ->leftJoin('telefones', function ($join) {
                $join->on(
                    'telefones.id', '=',
                    \DB::raw('(SELECT telefone_atual.id FROM telefones as telefone_atual 
                        where telefone_atual.cliente_id = clientes.id ORDER BY telefone_atual.id DESC LIMIT 1)')
                );
            })
            ->orderBy('chamadas.data_contratado', 'DESC')
            ->groupBy('clientes.id')
            ->select([
                'chamadas.id',
                'clientes.id as idCliente',
                'clientes.name',
                'clientes.cpf',
                'clientes.conta',
                'agencias.numero_agencia',
                'telefones.telefone'
            ]);

        # Recuperando a coluna de permissões
        $arrayRole = array_column(Auth::user()->roles->toArray(), 'role');

        # Verificando a permissão
        if(!in_array('ROLE_ADMIN', $arrayRole) && !in_array('ROLE_GERENTE', $arrayRole)) {
            $rows->where('users.id', Auth::user()->id);
        }

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

                # Filtrando por mes
                if ($request->has('agente')) {
                    $query->where('operadores.id_operadores', '=', $request->get('agente'));
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

                # Filtrando por contratos com data de religação pendente @Felipe, @Andrey
                if ($request->has('pendentes')) {
                    $now = new \DateTime('now');
                    $query->where('chamadas.data_prox_chamada', '<=', $now->format('Y-m-d'));
                }

            })
            ->addColumn('contratos', function ($row) {
                # Array de consulta
                $arrayFilter = ['cliente_id' => $row->idCliente];

                # Filtro de usuário
                if(Auth::user()->is('ROLE_OPERADOR')) {
                    $arrayFilter['user_id'] = Auth::user()->id;
                }

                # Retorno
                return $this->contratoRepository->with(['tipoContrato', 'convenio', 'usuario', 'documentos'])
                    ->findByField($arrayFilter);
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
        #variavel de uso
        $selectAgencia = [];

        #Carregando os dados para o cadastro
        $loadFields = $this->service->load($this->loadFields);
        $agencias = $this->service->buscaAgencia();

        foreach ($agencias as $agencia) {
            $selectAgencia[$agencia->id] = $agencia->numero_agencia.' - '.$agencia->nome_agencia;
        }

        # Array de parcelas
        $arrayParcelas = ['' => 'Selecione uma parcela'];

        # Criando as parcelas
        for ($i = 1; $i <= 96; $i++) {
            $arrayParcelas[$i] = $i;
        }

        #Retorno para view
        return view('contrato.create', compact('loadFields', 'selectAgencia', 'arrayParcelas'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function createContrato($id)
    {
        try {
            #
            $selectAgencia = [];

            #Recuperando o contrato
            $model = $this->clienteRepository->find($id);

            #Carregando os dados para o cadastro
            $loadFields = $this->service->load($this->loadFields);

            #Carregando select de agência
            $agencias = $this->service->buscaAgencia();

            foreach ($agencias as $agencia) {
                $selectAgencia[] = [$agencia->id => $agencia->numero_agencia.' - '.$agencia->nome_agencia];
            }

            # Array de parcelas
            $arrayParcelas = ['' => 'Selecione uma parcela'];

            # Criando as parcelas
            for ($i = 1; $i <= 96; $i++) {
                $arrayParcelas[$i] = $i;
            }

            #retorno para view
            return view('contrato.createContrato', compact('model', 'loadFields', 'selectAgencia', 'arrayParcelas'));
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

            #Validando a requisição
            $this->service->tratamentoCampos($data);

            #Executando a ação
            $this->service->store($data);

            #Retorno para a view
            return redirect()->back()->with("message", "Cadastro realizado com sucesso!");
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($this->validator->errors())->withInput();
        } catch (\Throwable $e) { dd($e);
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
            #
            $selectAgencia = [];

            #Recuperando o contrato
            $model = $this->clienteRepository->find($id);

            #Carregando select de agência
            $agencias = $this->service->buscaAgencia();

            foreach ($agencias as $agencia) {
                $selectAgencia[$agencia->id] = $agencia->numero_agencia.' - '.$agencia->nome_agencia;
            }

            # Array de parcelas
            $arrayParcelas = ['' => 'Selecione uma parcela'];

            # Criando as parcelas
            for ($i = 1; $i <= 72; $i++) {
                $arrayParcelas[$i] = $i;
            }

            #retorno para view
            return view('contrato.edit', compact('model', 'selectAgencia'));
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

    /**
     * @param $id
     * @return Response
     */
    public function viewContrato($id)
    {
        try {
            # Recuperando o path do arquivo
            $path = $this->service->getPathArquivo($id);

            # Retorno
            return new Response(file_get_contents($path), 200, [
                'Content-Type' => $this->mimeTypeHelper->getMimeType($path),
                'Content-Disposition' => 'inline; filename="'
                    .$this->mimeTypeHelper->getNewNameWithExtension($path, 'contrato').'"'
            ]);
        } catch (\Throwable $e) {
            return \Illuminate\Support\Facades\Response::json(['success' => false,'msg' => $e->getMessage()]);
        }
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function searchCpf(Request $request)
    {
        try {
            #Declaração de variável de uso
            $result = false;
            #Dados vindo na requisição
            $contrato = $request->all();

            #
            if (empty($contrato['idModel'])) {
                #Consultando
                $cpfCliente = \DB::table('clientes')
                    ->select([
                        'clientes.cpf'
                    ])
                    ->where('clientes.cpf', $contrato['value'])
                    ->get();

            } else {
                #Consultando
                $cpfCliente = \DB::table('clientes')
                    ->select([
                        'clientes.id',
                        'clientes.cpf'
                    ])
                    ->where('clientes.id', '!=' ,$contrato['idModel'])
                    ->where('clientes.cpf', $contrato['value'])
                    ->get();
            }

            if (count($cpfCliente) > 0 ) {
                $result = true;
            }

            #retorno para view
            return \Illuminate\Support\Facades\Response::json(['success' => $result]);
        } catch (\Throwable $e) {
            return \Illuminate\Support\Facades\Response::json(['success' => false,'msg' => $e->getMessage()]);
        }
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function searchContrato(Request $request)
    {
        try{
            #Declaração de variável de uso
            $result = false;
            #Recuperando dados da requisição
            $contrato = $request->all();

            #Consultando
            $query = \DB::table('chamadas')
                ->select([
                    'codigo_transacao'
                ])
                ->where('codigo_transacao', $contrato['value'])
                ->get();

            if (count($query) > 0 ) {
                $result = true;
            }

            #retorno para view
            return \Illuminate\Support\Facades\Response::json(['success' => $result]);
        } catch (\Throwable $e) {
            return \Illuminate\Support\Facades\Response::json(['success' => false,'msg' => $e->getMessage()]);
        }
    }

    /*Metodo responsavel por retornar todas as agência cadastradas a fim de alimentar
    o select "agencia" em "novo cliente" e "editar cliente"*/
    public function buscaAgencia()
    {
        try{
            #Consultado
            $agencia = \DB::table('agencias_callcenter')
                ->select([
                    'agencias_callcenter.id',
                    'agencias_callcenter.numero_agencia',
                    'agencias_callcenter.nome_agencia',
                ])
                ->get();

            #retorno para view
            return \Illuminate\Support\Facades\Response::json(['success' => true, 'dados' => $agencia]);
        } catch (\Throwable $e) {
            return \Illuminate\Support\Facades\Response::json(['success' => false,'msg' => $e->getMessage()]);
        }
    }

    /*Metodo responsavel por retornar o número da agência a fim de alimentar
    o campo "no. agencia" em "novo cliente" e "editar cliente"*/
    public function buscaNoAgencia($agencia)
    {
        try{
            #Consultado
            $noAgencia = \DB::table('agencias_callcenter')
                ->select([
                    'agencias_callcenter.id',
                    'agencias_callcenter.numero_agencia'])
                ->where('id', $agencia)
                ->get();

            #retorno para view
            return \Illuminate\Support\Facades\Response::json(['success' => true, 'dados' => $noAgencia]);
        } catch (\Throwable $e) {
            return \Illuminate\Support\Facades\Response::json(['success' => false,'msg' => $e->getMessage()]);
        }
    }
}
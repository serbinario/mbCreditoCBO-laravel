<?php

namespace MbCreditoCBO\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use MbCreditoCBO\Http\Requests;
use MbCreditoCBO\Services\ContratoService;
use Yajra\Datatables\Datatables;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;
use MbCreditoCBO\Validators\ContratoValidator;
use MbCreditoCBO\Http\Controllers\Controller;

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
    private $loadFields = [];

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
     * @return mixed
     */
    public function index()
    {
        try {
            # Recuperando todas os operadores
            $contratos = $this->repository->all();

            # Retorno Json
            return response()->json(['data' => $contratos]);
        } catch (\Throwable $e) {
            return response()->json(['error'   => true,'message' => $e->getMessage()]);
        }
    }

//    public function grid()
//    {
//        #Criando a consulta
//        $rows = \DB::table('chamadas')
//            ->join('clientes', 'clientes.id', '=', 'chamadas.cliente_id')
//            ->join('agencias_callcenter', 'agencias_callcenter.id', '=', 'clientes.agencia_id')
//            ->join('telefones', 'telefones.id', '=', 'clientes.id')
//            ->select
//            ([
//                'chamadas.id',
//                'clientes.name',
//                'clientes.cpf',
//                'agencias_callcenter.numero_agencia',
//                'clientes.conta',
//                'telefones.telefone',
//            ]);
//
//        #Editando a grid
//        return Datatables::of($rows)->addColumn('action', function ($row) {
//            return '<a href="edit/'.$row->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Editar</a>';
//        })->make(true);
//    }

    /**
     * @param ContratoCreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ContratoCreateRequest $request)
    {
        try {
            #Validando dados
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            #Salvando dados
            $contratos = $this->repository->create($request->all());

            $response = [
                'message' => 'Pessoa created.',
                'data'    => $contratos->toArray(),
            ];

            #Resposta JSON
            return response()->json($response);
        } catch (ValidatorException $e) {
            return response()->json(['error'   => true,'message' => $e->getMessageBag()]);
        } catch (\Throwable $e) {
            return response()->json(['error'   => true,'message' => $e->getMessage()]);
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            #Recuperando registro especifico
            $contrato = $this->repository->find($id);

            #Retorno Json
            return response()->json(['data' => $contrato]);
        } catch (\Throwable $e) {
            return response()->json(['error'   => true,'message' => $e->getMessage()]);
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        try {
            #Validando dados
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            #Retornando registro especifico
            $contrato = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'Pessoa updated.',
                'data'    => $contrato->toArray(),
            ];

            #Resposta JSON
            return response()->json($response);
        } catch (ValidatorException $e) {
            return response()->json(['error'   => true,'message' => $e->getMessageBag()]);
        } catch (\Throwable $e) {
            return response()->json(['error'   => true,'message' => $e->getMessage()]);
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            #Deletando registro especifico
            $deleted = $this->repository->delete($id);

            #Resposta JSON
            return response()->json(['message' => 'Pessoa deleted.', 'deleted' => $deleted]);
        } catch (\Throwable $e) {
            return response()->json(['error'   => true,'message' => $e->getMessage()]);
        }
    }

}

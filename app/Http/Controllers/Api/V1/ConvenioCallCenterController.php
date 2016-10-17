<?php

namespace MbCreditoCBO\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use MbCreditoCBO\Http\Requests;
use MbCreditoCBO\Services\ConvenioCallCenterService;
use Yajra\Datatables\Datatables;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;
use MbCreditoCBO\Validators\ConvenioCallCenterValidator;
use MbCreditoCBO\Http\Controllers\Controller;

class ConvenioCallCenterController extends Controller
{
    /**
    * @var ConvenioCallCenterService
    */
    private $service;

    /**
    * @var ConvenioCallCenterValidator
    */
    private $validator;

    /**
    * @var array
    */
    private $loadFields = [];

    /**
    * @param ConvenioCallCenterService $service
    * @param ConvenioCallCenterValidator $validator
    */
    public function __construct(ConvenioCallCenterService $service, ConvenioCallCenterValidator $validator)
    {
        $this->service   =  $service;
        $this->validator =  $validator;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            # Recuperando todas as agencias
            $convenio = $this->repository->all();

            # Retorno Json
            return response()->json(['data' => $convenio]);
        } catch (\Throwable $e) {
            return response()->json(['error'   => true,'message' => $e->getMessage()]);
        }
    }

//    public function grid()
//    {
//        #Criando a consulta
//        $rows = \DB::table('convenios_callcenter')->select(['id', 'nome_convenio']);
//
//        #Editando a grid
//        return Datatables::of($rows)->addColumn('action', function ($row) {
//            return '<a href="edit/'.$row->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Editar</a>';
//        })->make(true);
//    }

    /**
     * @param ConvenioCreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ConvenioCreateRequest $request)
    {
        try {
            #Validando dados
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            #Salvando registro
            $convenios = $this->repository->create($request->all());

            $response = [
                'message' => 'Convenio created.',
                'data'    => $convenios->toArray(),
            ];

            #Retorno JSON
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
            $convenio = $this->repository->find($id);

            #Retorno Json
            return response()->json(['data' => $convenio]);
        } catch (\Throwable $e) {
            return response()->json(['error'   => true,'message' => $e->getMessage()]);
        }
    }

    /**
     * @param ConvenioUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ConvenioUpdateRequest $request, $id)
    {
        try {
            #Validando dados
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            #Retornando registro especifico
            $convenio = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'Pessoa updated.',
                'data'    => $convenio->toArray(),
            ];

            #Resposta JSON
            return response()->json($response);
        } catch (ValidatorException $e) {
            return response()->json(['error'   => true,'message' => $e->getMessageBag()]);
        } catch (\Throwable $e) {
            return response()->json(['error'   => true,'message' => $e->getMessage()]);
        }
    }

}

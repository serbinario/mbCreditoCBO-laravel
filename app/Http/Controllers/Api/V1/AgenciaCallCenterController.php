<?php

namespace MbCreditoCBO\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use MbCreditoCBO\Http\Requests;
use MbCreditoCBO\Services\AgenciaCallCenterService;
use Yajra\Datatables\Datatables;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;
use MbCreditoCBO\Validators\AgenciaCallCenterValidator;
use MbCreditoCBO\Http\Controllers\Controller;

class AgenciaCallCenterController extends Controller
{
    /**
    * @var AgenciaCallCenterService
    */
    private $service;

    /**
    * @var AgenciaCallCenterValidator
    */
    private $validator;

    /**
    * @var array
    */
    private $loadFields = [];

    /**
    * @param AgenciaCallCenterService $service
    * @param AgenciaCallCenterValidator $validator
    */
    public function __construct(AgenciaCallCenterService $service, AgenciaCallCenterValidator $validator)
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
            $agencia = $this->repository->all();

            # Retorno Json
            return response()->json(['data' => $agencia]);
        } catch (\Throwable $e) {
            return response()->json(['error'   => true,'message' => $e->getMessage()]);
        }
    }

//    public function grid()
//    {
//        #Criando a consulta
//        $rows = \DB::table('agencias_callcenter')->select(['id', 'numero_agencia', 'nome_agencia']);
//
//        #Editando a grid
//        return Datatables::of($rows)->addColumn('action', function ($row) {
//            return '<a href="edit/'.$row->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Editar</a>';
//        })->make(true);
//    }

    /**
     * @param AgenciaCreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(AgenciaCreateRequest $request)
    {
        try {
            #Validando dados
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            #Salvando registro
            $agencias = $this->repository->create($request->all());

            $response = [
                'message' => 'Agencia created.',
                'data'    => $agencias->toArray(),
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
            $agencia = $this->repository->find($id);

            #Retorno Json
            return response()->json(['data' => $agencia]);
        } catch (\Throwable $e) {
            return response()->json(['error'   => true,'message' => $e->getMessage()]);
        }
    }

    /**
     * @param AgenciaUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(AgenciaUpdateRequest $request, $id)
    {
        try {
            #Validando dados
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            #Retornando registro especifico
            $agencia = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'Pessoa updated.',
                'data'    => $agencia->toArray(),
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

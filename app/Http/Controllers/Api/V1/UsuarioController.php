<?php

namespace MbCreditoCBO\Http\Controllers;

use Illuminate\Http\Request;

use MbCreditoCBO\Http\Requests;
use MbCreditoCBO\Http\Controllers\Controller;
use MbCreditoCBO\Services\UserService;
use MbCreditoCBO\Validators\UserValidator;
use Yajra\Datatables\Datatables;
use Prettus\Validator\Contracts\ValidatorInterface;

class UsuarioController extends Controller
{
    /**
     * @var UserService
     */
    private $service;

    /**
     * @var UserValidator
     */
    private $validator;

    /**
     * @var array
     */
    private $loadFields = [
        'Role',
        'Permission'
    ];

    /**
     * @param UserService $service
     * @param UserValidator $validator
     */
    public function __construct(UserService $service, UserValidator $validator)
    {
        $this->service   = $service;
        $this->validator = $validator;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            # Recuperando todas as agencias
            $usuario = $this->repository->all();

            # Retorno Json
            return response()->json(['data' => $usuario]);
        } catch (\Throwable $e) {
            return response()->json(['error'   => true,'message' => $e->getMessage()]);
        }
    }

//    public function grid()
//    {
//        #Criando a consulta
//        $users = \DB::table('users')->select(['id', 'name', 'email']);
//
//        #Editando a grid
//        return Datatables::of($users)->addColumn('action', function ($user) {
//            return '<a href="edit/'.$user->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Editar</a>';
//        })->make(true);
//    }

    /**
     * @param UsuarioCreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UsuarioCreateRequest $request)
    {
        try {
            #Validando dados
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            #Salvando registro
            $usuarios = $this->repository->create($request->all());

            $response = [
                'message' => 'Agencia created.',
                'data'    => $usuarios->toArray(),
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
            $usuario = $this->repository->find($id);

            #Retorno Json
            return response()->json(['data' => $usuario]);
        } catch (\Throwable $e) {
            return response()->json(['error'   => true,'message' => $e->getMessage()]);
        }
    }

    /**
     * @param UsuarioUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UsuarioUpdateRequest $request, $id)
    {
        try {
            #Validando dados
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            #Retornando registro especifico
            $usuario = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'Pessoa updated.',
                'data'    => $usuario->toArray(),
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

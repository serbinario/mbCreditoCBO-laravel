<?php

namespace MbCreditoCBO\Services;

use MbCreditoCBO\Repositories\UserRepository;
use MbCreditoCBO\Entities\User;

class UserService
{
    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public function find($id)
    {
        #Recuperando o registro no banco de dados
        $user = $this->repository->find($id);

        #Verificando se o registro foi encontrado
        if(!$user) {
            throw new \Exception('Empresa não encontrada!');
        }

        #retorno
        return $user;
    }

    /**
     * @param array $data
     * @return array
     */
    public function store(array $data) : User
    {
        #Salvando o registro pincipal
        $user =  $this->repository->create($data);

        #Verificando se foi criado no banco de dados
        if(!$user) {
            throw new \Exception('Ocorreu um erro ao cadastrar!');
        }

        #Retorno
        return $user;
    }

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data, int $id) : User
    {
        #Atualizando no banco de dados
        $user = $this->repository->update($data, $id);


        #Verificando se foi atualizado no banco de dados
        if(!$user) {
            throw new \Exception('Ocorreu um erro ao cadastrar!');
        }

        #Retorno
        return $user;
    }

    /**
     * @param array $models
     * @return array
     */
    public function load(array $models) : array
    {
        #Declarando variáveis de uso
        $result = [];

        #Criando e executando as consultas
        foreach ($models as $model) {
            #qualificando o namespace
            $nameModel = "MbCreditoCBO\\Entities\\$model";

            #Recuperando o registro e armazenando no array
            $result[strtolower($model)] = $nameModel::lists('nome', 'id');
        }

        #retorno
        return $result;
    }
}
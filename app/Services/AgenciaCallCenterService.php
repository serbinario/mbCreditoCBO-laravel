<?php

namespace MbCreditoCBO\Services;

use MbCreditoCBO\Repositories\AgenciaCallCenterRepository;
use MbCreditoCBO\Entities\AgenciaCallCenter;

class AgenciaCallCenterService
{
    /**
     * @var AgenciaCallCenterRepository
     */
    private $repository;

    /**
     * @param AgenciaCallCenterRepository $repository
     */
    public function __construct(AgenciaCallCenterRepository $repository)
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
        $agenciaCallCenter = $this->repository->find($id);

        #Verificando se o registro foi encontrado
        if(!$agenciaCallCenter) {
            throw new \Exception('Empresa não encontrada!');
        }

        #retorno
        return $agenciaCallCenter;
    }

    /**
     * @param array $data
     * @return array
     */
    public function store(array $data) : AgenciaCallCenter
    {
        #Salvando o registro pincipal
        $agenciaCallCenter =  $this->repository->create($data);

        #Verificando se foi criado no banco de dados
        if(!$agenciaCallCenter) {
            throw new \Exception('Ocorreu um erro ao cadastrar!');
        }

        #Retorno
        return $agenciaCallCenter;
    }

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data, int $id) : AgenciaCallCenter
    {
        #Atualizando no banco de dados
        $agenciaCallCenter = $this->repository->update($data, $id);


        #Verificando se foi atualizado no banco de dados
        if(!$agenciaCallCenter) {
            throw new \Exception('Ocorreu um erro ao cadastrar!');
        }

        #Retorno
        return $agenciaCallCenter;
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
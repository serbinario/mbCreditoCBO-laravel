<?php

namespace MbCreditoCBO\Services;

use MbCreditoCBO\Repositories\ConvenioCallCenterRepository;
use MbCreditoCBO\Entities\ConvenioCallCenter;

class ConvenioCallCenterService
{
    /**
     * @var ConvenioCallCenterRepository
     */
    private $repository;

    /**
     * @param ConvenioCallCenterRepository $repository
     */
    public function __construct(ConvenioCallCenterRepository $repository)
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
        $convenioCallCenter = $this->repository->find($id);

        #Verificando se o registro foi encontrado
        if(!$convenioCallCenter) {
            throw new \Exception('Empresa não encontrada!');
        }

        #retorno
        return $convenioCallCenter;
    }

    /**
     * @param array $data
     * @return array
     */
    public function store(array $data) : ConvenioCallCenter
    {
        #Salvando o registro pincipal
        $convenioCallCenter =  $this->repository->create($data);

        #Verificando se foi criado no banco de dados
        if(!$convenioCallCenter) {
            throw new \Exception('Ocorreu um erro ao cadastrar!');
        }

        #Retorno
        return $convenioCallCenter;
    }

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data, int $id) : ConvenioCallCenter
    {
        #Atualizando no banco de dados
        $convenioCallCenter = $this->repository->update($data, $id);


        #Verificando se foi atualizado no banco de dados
        if(!$convenioCallCenter) {
            throw new \Exception('Ocorreu um erro ao cadastrar!');
        }

        #Retorno
        return $convenioCallCenter;
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
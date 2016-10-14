<?php

namespace MbCreditoCBO\Services;

use MbCreditoCBO\Repositories\ContratoRepository;
use MbCreditoCBO\Entities\Contrato;

class ContratoService
{
    /**
     * @var ContratoRepository
     */
    private $repository;

    /**
     * @param ContratoRepository $repository
     */
    public function __construct(ContratoRepository $repository)
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
        $contrato = $this->repository->find($id);

        #Verificando se o registro foi encontrado
        if(!$contrato) {
            throw new \Exception('Empresa não encontrada!');
        }

        #retorno
        return $contrato;
    }

    /**
     * @param array $data
     * @return array
     */
    public function store(array $data) : Contrato
    {
        #Salvando o registro pincipal
        $contrato =  $this->repository->create($data);

        #Verificando se foi criado no banco de dados
        if(!$contrato) {
            throw new \Exception('Ocorreu um erro ao cadastrar!');
        }

        #Retorno
        return $contrato;
    }

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data, int $id) : Contrato
    {
        #Atualizando no banco de dados
        $contrato = $this->repository->update($data, $id);


        #Verificando se foi atualizado no banco de dados
        if(!$contrato) {
            throw new \Exception('Ocorreu um erro ao cadastrar!');
        }

        #Retorno
        return $contrato;
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
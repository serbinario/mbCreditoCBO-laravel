<?php

namespace cboMbcredito\Services;

use cboMbcredito\Repositories\OperadorRepository;
use cboMbcredito\Entities\Operador;

class OperadorService
{
    /**
     * @var OperadorRepository
     */
    private $repository;

    /**
     * @param OperadorRepository $repository
     */
    public function __construct(OperadorRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public function find($id_operadores)
    {

        #Recuperando o registro no banco de dados
        $operador = $this->repository->findWhere(['id_operadores' => $id_operadores]);

        #Verificando se o registro foi encontrado
        if(!$operador) {
            throw new \Exception('Agente não encontrado!');
        }

        #retorno
        return $operador[0];
    }

    /**
     * @param array $data
     * @return array
     */
    public function store(array $data) : Operador
    {
        #Salvando o registro pincipal
        $operador =  $this->repository->create($data);

        #Verificando se foi criado no banco de dados
        if(!$operador) {
            throw new \Exception('Ocorreu um erro ao cadastrar!');
        }

        #Retorno
        return $operador;
    }

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data, int $id) : Operador
    {
        #Atualizando no banco de dados
        $operador = $this->repository->update($data, $id);


        #Verificando se foi atualizado no banco de dados
        if(!$operador) {
            throw new \Exception('Ocorreu um erro ao cadastrar!');
        }

        #Retorno
        return $operador;
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
            $nameModel = "cboMbcredito\\Entities\\$model";

            #Recuperando o registro e armazenando no array
            $result[strtolower($model)] = $nameModel::lists('nome', 'id');
        }

        #retorno
        return $result;
    }
}
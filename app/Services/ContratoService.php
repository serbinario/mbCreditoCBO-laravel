<?php

namespace MbCreditoCBO\Services;

use MbCreditoCBO\Repositories\ClienteRepository;
use MbCreditoCBO\Repositories\ContratoRepository;
use MbCreditoCBO\Repositories\TelefoneRepository;
use MbCreditoCBO\Entities\Contrato;
use MbCreditoCBO\Repositories\TelefoneRepositoryEloquent;

class ContratoService
{
    /**
     * @var ContratoRepository
     */
    private $repository;

    /**
     * @param ContratoRepository $repository
     */
    public function __construct(ContratoRepository $repository,
                                ClienteRepository $clienteRepository,
                                TelefoneRepository $telefoneRepository)
    {
        $this->repository = $repository;
        $this->clienteRepository = $clienteRepository;
        $this->telefoneRepository = $telefoneRepository;

    }

    /**
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public function find($id)
    {

        $relacao = [
            'cliente.telefone'
        ];

        #Recuperando o registro no banco de dados
        $contrato = $this->repository->with($relacao)->find($id);

        #Verificando se o registro foi encontrado
        if(!$contrato) {
            throw new \Exception('Contrato não encontrada!');
        }

        #retorno
        return $contrato;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function tratamentoCliente(array $data)
    {
        #Separando registros
        $dados = $data['cliente'];

        #Salvando registro
        $cliente = $this->clienteRepository->create($dados);

        #Retorno
        return $cliente;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function tratamentoTelefone(array $data, $idCliente)
    {
        #criando arrya de telefone - tb_telefones
        $dados = ['telefone' => $data['telefone']['numero'], 'cliente_id' => $idCliente->id];

        #Salvando registro e vinculando ao cliente
        $telefone = $this->telefoneRepository->create($dados);

        #Retorno
        return $telefone;
    }

    /**
     * @param array $data
     * @return Contrato
     * @throws \Exception
     */
    public function store(array $data) : Contrato
    {
        #Retorno
        $cliente = $this->tratamentoCliente($data);

        #Salvando registro de tlefone
        $telefone = $this->tratamentoTelefone($data, $cliente);

        #Criando vinculo
        $data['cliente_id'] = $cliente->id;

        #Salvando registro pincipal
        $contrato = $this->repository->create($data);

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
     * Método load
     *
     * Método responsável por recuperar todos os models (com seus repectivos
     * métodos personalizados para consulta, se for o caso) do array passado
     * por parâmetro.
     *
     * @param array $models || Melhorar esse código
     * @return array
     */
    public function load(array $models, $ajax = false) : array
    {
        #Declarando variáveis de uso
        $result    = [];
        $expressao = [];

        #Criando e executando as consultas
        foreach ($models as $model) {
            # separando as strings
            $explode   = explode("|", $model);

            # verificando a condição
            if(count($explode) > 1) {
                $model     = $explode[0];
                $expressao = explode(",", $explode[1]);
            }

            #qualificando o namespace
            $nameModel = "\\MbCreditoCBO\\Entities\\$model";

            #Verificando se existe sobrescrita do nome do model
            //$model     = isset($expressao[2]) ? $expressao[2] : $model;

            if ($ajax) {
                if(count($expressao) > 0) {
                    switch (count($expressao)) {
                        case 1 :
                            #Recuperando o registro e armazenando no array
                            $result[strtolower($model)] = $nameModel::{$expressao[0]}()->orderBy('nome', 'asc')->get(['nome', 'id', 'codigo']);
                            break;
                        case 2 :
                            #Recuperando o registro e armazenando no array
                            $result[strtolower($model)] = $nameModel::{$expressao[0]}($expressao[1])->orderBy('nome', 'asc')->get(['nome', 'id', 'codigo']);
                            break;
                        case 3 :
                            #Recuperando o registro e armazenando no array
                            $result[strtolower($model)] = $nameModel::{$expressao[0]}($expressao[1], $expressao[2])->orderBy('nome', 'asc')->get(['nome', 'id', 'codigo']);
                            break;
                    }

                } else {
                    #Recuperando o registro e armazenando no array
                    $result[strtolower($model)] = $nameModel::orderBy('nome', 'asc')->get(['nome', 'id']);
                }
            } else {
                if(count($expressao) > 0) {
                    switch (count($expressao)) {
                        case 1 :
                            #Recuperando o registro e armazenando no array
                            $result[strtolower($model)] = $nameModel::{$expressao[0]}()->orderBy('nome', 'asc')->lists('nome', 'id');
                            break;
                        case 2 :
                            #Recuperando o registro e armazenando no array
                            $result[strtolower($model)] = $nameModel::{$expressao[0]}($expressao[1])->orderBy('nome', 'asc')->lists('nome', 'id');
                            break;
                        case 3 :
                            #Recuperando o registro e armazenando no array
                            $result[strtolower($model)] = $nameModel::{$expressao[0]}($expressao[1], $expressao[2])->orderBy('nome', 'asc')->lists('nome', 'id');
                            break;
                    }
                } else {
                    #Recuperando o registro e armazenando no array
                    $result[strtolower($model)] = $nameModel::lists('nome', 'id');
                }
            }

            # Limpando a expressão
            $expressao = [];
        }

        #retorno
        return $result;
    }

}
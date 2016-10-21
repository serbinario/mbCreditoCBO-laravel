<?php

namespace MbCreditoCBO\Services;

use MbCreditoCBO\Repositories\RoleRepository;
use MbCreditoCBO\Repositories\UsuarioRepository;
use MbCreditoCBO\Repositories\UserHoleRepository;
use MbCreditoCBO\Entities\Usuario;

class UsuarioService
{
    /**
     * @var UsuarioRepository
     */
    private $repository;

    /**
     * @param UsuarioRepository $repository
     */
    public function __construct(RoleRepository $roleRepository , UsuarioRepository $repository, UserHoleRepository $userHoleRepository)
    {
        $this->repository = $repository;
        $this->roleRepository = $roleRepository;
        $this->userHoleRepository = $userHoleRepository;
    }

    /**
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public function find($id)
    {
        #Recuperando o registro no banco de dados
        $usuario = $this->repository->find($id);

        #Verificando se o registro foi encontrado
        if(!$usuario) {
            throw new \Exception('Empresa não encontrada!');
        }

        #retorno
        return $usuario;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function tratamentoUsuario($data)
    {
        #Separando dados
        $dados = $data['usuario'];
dd($dados);
        #Salvando registro
        $usuario = $this->repository->create($dados);

        #Retorno
        return $usuario;
    }

    public function tratamentoPermissoesUsuario($data)
    {
        #Usuário
        $usuario = $this->tratamentoUsuario($data);

        #Separando dados
        $permissao = $data['role'];

        #Criando registro nível de permissão
        $dados = ['user_id' => $usuario->id, 'role_id' => $permissao['level']];

        return $dados;
    }

    /**
     * @param array $data
     * @return array
     */
    public function store(array $data) : Usuario
    {
        #Retorno de metodos participantes
        $usuario = $this->tratamentoUsuario($data);
        $permissoes = $this->tratamentoPermissoesUsuario($data);

        #Salvando registro principal
        $this->userHoleRepository->create($permissoes);

        #Verificando se foi criado no banco de dados
        if(!$usuario) {
            throw new \Exception('Ocorreu um erro ao cadastrar!');
        }

        #Retorno
        return $usuario;
    }

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data, int $id) : Usuario
    {
        #Atualizando no banco de dados
        $usuario = $this->repository->update($data, $id);


        #Verificando se foi atualizado no banco de dados
        if(!$usuario) {
            throw new \Exception('Ocorreu um erro ao cadastrar!');
        }

        #Retorno
        return $usuario;
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
            $result[strtolower($model)] = $nameModel::lists('nome_operadores', 'id_operadores');
        }

        #retorno
        return $result;
    }

    /**
     * @param array $models
     * @return array
     */
    public function loadUsuario(array $models) : array
    {
        #Declarando variáveis de uso
        $result = [];

        #Criando e executando as consultas
        foreach ($models as $model) {
            #qualificando o namespace
            $nameModel = "MbCreditoCBO\\Entities\\$model";

            #Recuperando o registro e armazenando no array
            $result[strtolower($model)] = $nameModel::lists('id', 'username', 'password', 'email');
        }

        #retorno
        return $result;
    }
}
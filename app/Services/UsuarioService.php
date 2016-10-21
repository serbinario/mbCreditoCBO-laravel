<?php

namespace MbCreditoCBO\Services;

use MbCreditoCBO\Repositories\OperadorRepository;
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
    public function __construct(RoleRepository $roleRepository ,
                                UsuarioRepository $repository,
                                UserHoleRepository $userHoleRepository,
                                OperadorRepository $operadorRepository)
    {
        $this->repository = $repository;
        $this->roleRepository = $roleRepository;
        $this->userHoleRepository = $userHoleRepository;
        $this->operadorRepository = $operadorRepository;
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
    public function registrandoUsuario($data)
    {
        #Separando dados de usuario - tabela users
        $dados = $data['usuario'];

        #Encripitando a senha
        $dados['password'] = \bcrypt($dados['password']);

        #Salvando registro
        $usuario = $this->repository->create($dados);

        #Retorno
        return $usuario;
    }

    /**
     * @param $data
     * @return array
     */
    public function nivelPermissoesUsuario($data, $idUsuario)
    {
        #Separando dados de nível de permissão - tabela users_has_roles
        $permissao = $data['role'];

        #Criando registro nível de permissão
        $dados = ['user_id' => $idUsuario, 'role_id' => $permissao['role_id']];

        #Retorno
        return $dados;
    }

    /**
     * @param array $data
     * @return array
     */
    public function store(array $data)
    {
        #Metodo responsavel por registrar o usuario - tabela users
        $usuario = $this->registrandoUsuario($data);

        #Metodo responsavel por registrar o nível de permissão - tabela users_has_roles
        $permissoes = $this->nivelPermissoesUsuario($data, $usuario->id);

        #Salvando nivel de permissao do usuario - tabela users_has_roles
        $usuarioRole = $this->userHoleRepository->create($permissoes);

        #Verificando se foi criado no banco de dados
        if(!$usuarioRole) {
            throw new \Exception('Ocorreu um erro ao cadastrar!');
        }

        #Retorno
        return $usuarioRole;
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
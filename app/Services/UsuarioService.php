<?php

namespace MbCreditoCBO\Services;

use MbCreditoCBO\Repositories\OperadorRepository;
use MbCreditoCBO\Repositories\HoleRepository;
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
    public function __construct(HoleRepository $holeRepository ,
                                UsuarioRepository $repository,
                                UserHoleRepository $userHoleRepository,
                                OperadorRepository $operadorRepository)
    {
        $this->repository = $repository;
        $this->holeRepository = $holeRepository;
        $this->userHoleRepository = $userHoleRepository;
        $this->operadorRepository = $operadorRepository;
    }

    public function find($id)
    {
        $relacao = [
            'operador',
            'roles'
        ];

        #Recuperando o registro no banco de dados
        $contrato = $this->repository->with($relacao)->find($id);

        #Verificando se o registro foi encontrado
        if(!$contrato) {
            throw new \Exception('Usuário não encontrado!');
        }

        #retorno
        return $contrato;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function registrandoUsuario($data)
    {
        #Encripitando a senha
        $data['password'] = \bcrypt($data['password']);

        #
        $data['active'] = 1;

        #Salvando registro
        $usuario = $this->repository->create($data);

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
        $permissoes = $data['userHole'];

        #Salvando registros
        foreach ($permissoes as $permissao) {
            #Salvando nivel de permissao do usuario - tabela users_has_roles
            $this->userHoleRepository->create(['user_id' => $idUsuario, 'role_id' => $permissao]);
        }

        #Retorno
        return true;
    }

    /**
     * @param array $data
     * @return array
     */
    public function store(array $data) : Usuario
    {
        #Metodo responsavel por registrar o usuario - tabela users
        $usuario = $this->registrandoUsuario($data);

        #Metodo responsavel por registrar o nível de permissão - tabela users_has_roles
        $permissoes = $this->nivelPermissoesUsuario($data, $usuario->id);

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
        #tratando a senha
        if(empty($data['password'])) {
            unset($data['password']); //Aqui estou destruíndo o índece do array, que armazena a senha
        } else {
            $newPassword = \bcrypt($data['password']);
        }

        #Atualizando no banco de dados
        $usuario = $this->repository->update($data, $id);

        # Alterando a senha do usuário
        if(isset($newPassword)) {
            $usuario->fill([
                'password' => $newPassword //Aqui estou inserindo mais um índece no array, que armazenará a senha
            ])->save();
        }


        #Verificando se foi atualizado no banco de dados
        if(!$usuario) {
            throw new \Exception('Ocorreu um erro ao cadastrar!');
        }

        #Retorno
        return $usuario;
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
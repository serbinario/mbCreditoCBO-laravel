<?php

namespace MbCreditoCBO\Services;

use Illuminate\Support\Facades\Auth;
use MbCreditoCBO\Entities\Cliente;
use MbCreditoCBO\Entities\Documento;
use MbCreditoCBO\Entities\Telefone;
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
     * @var string
     */
    private $destinationPath = "images/";

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
        #Recuperando o registro no banco de dados
        $contrato = $this->repository->find($id);

        #Verificando se o registro foi encontrado
        if (!$contrato) {
            throw new \Exception('Contrato não encontrada!');
        }

        #retorno
        return $contrato;
    }

    /**
     * @param array $data
     * @return Contrato
     * @throws \Exception
     */
    public function store(array $data): Contrato
    {
        # Salvando o cliente e retornando o objeto
        $cliente = $this->tratamentoCliente($data);

        # Tratamento do número do contrato
        $this->numeroContrato($data);

        #Salvando registro de telefone
        $this->tratamentoTelefone($data, $cliente);

        #Criando vinculo entre contrato e cliente e usuário
        $data['contrato']['cliente_id'] = $cliente->id;
        $data['contrato']['user_id'] = Auth::user()->id;
        $data['contrato']['valor_contratado'] = str_replace(',', '.', $data['contrato']['valor_contratado']);

        #Salvando registro pincipal
        $contrato = $this->repository->create($data['contrato']);

        #Verificando se foi criado no banco de dados
        if (!$contrato) {
            throw new \Exception('Ocorreu um erro ao cadastrar!');
        }

        # Tratando a imagem
        $this->tratamentoImagem($data['contrato'], $contrato->id);

        #Retorno
        return $contrato;
    }

    /**
     * @param array $data
     * @param int $id
     * @return Cliente
     * @throws \Exception
     */
    public function update(array $data, int $id): Cliente
    {
        #Atualizando no banco de dados
        $cliente = $this->clienteRepository->update($data, $id);

        #Verificando se foi atualizado no banco de dados
        if (!$cliente) {
            throw new \Exception('Ocorreu um erro ao cadastrar!');
        }

        #Retorno
        return $cliente;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function tratamentoCliente($data)
    {
        # Recuperando os clientes
        $arrayCliente = $this->clienteRepository->findByField(['cpf' => $data['cpf']]);

        # validando a consulta
        if (count($arrayCliente) > 0) {
            return $arrayCliente[0];
        }

        # Salvando e retornando cliente
        return $this->clienteRepository->create($data);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function tratamentoTelefone(array $data, $cliente)
    {
        # Recortando os telefones em arrays
        if (!empty($data['telefones'])) {
            $telefonesArray = explode(',', $data['telefones']);

            # Percorrendo e salvando os telefones
            foreach ($telefonesArray as $telefone) {
                $cliente->telefones()->save(new Telefone(['telefone' => $telefone]));
            }
        }
    }

    /**
     * @param $data
     * @throws \Exception
     * Metodo responsavel por checar se o número de contrato que foi inserido
     * já se encontra cadastrado na base de dados
     */
    public function numeroContrato($data)
    {
        #Consultando
        $contrato = $this->repository->findWhere(['codigo_transacao' => $data['contrato']['codigo_transacao']]);

        #Validando
        if (count($contrato) > 0) {
            throw new \Exception('Número de contrato já existe.');
        }
    }

    /**
     * Método tratamentoImagem
     *
     * Método que faz o tratamento das imagens enviadas para o cadastro
     * do vestibulando.
     *
     * @param array $data
     * @return array
     */
    public function tratamentoImagem(array $data, $id)
    {
        #tratando a imagem
        foreach ($data as $key => $value) {
            $explode = explode("_", $key);

            if (count($explode) > 0 && $explode[0] == "path") {

                if (empty($data[$key])) {
                    return true;
                }

                $files = $data[$key];

                foreach($files as $chaveDoArquivo => $arquivo) {
                    if(!$arquivo) {
                        break;
                    }

                    # Criando e recuperando o nome da imagem
                    $fileName = md5(uniqid(rand(), true)) . "." . $arquivo->getClientOriginalExtension();

                    #Movendo a imagem
                    $arquivo->move($this->destinationPath, $fileName);

                    #Removendo o índice do array
                    unset($data[$key][$chaveDoArquivo]);

                    # Salvando o documento
                    Documento::create(['path_arquivo' => $fileName, 'chamada_id' => $id]);
                }
            }
        }
    }

    /**
     * @param $id
     * @return string
     */
    public function getPathArquivo($id)
    {
        # Recuperando o contrato
        $documento = Documento::where('id', $id)->first();

        #Retornando o caminho completo do arquivo
        return $this->destinationPath . $documento->path_arquivo;
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
    public function load(array $models, $ajax = false): array
    {
        #Declarando variáveis de uso
        $result = [];
        $expressao = [];

        #Criando e executando as consultas
        foreach ($models as $model) {
            # separando as strings
            $explode = explode("|", $model);

            # verificando a condição
            if (count($explode) > 1) {
                $model = $explode[0];
                $expressao = explode(",", $explode[1]);
            }

            #qualificando o namespace
            $nameModel = "\\MbCreditoCBO\\Entities\\$model";

            #Verificando se existe sobrescrita do nome do model
            //$model     = isset($expressao[2]) ? $expressao[2] : $model;

            if ($ajax) {
                if (count($expressao) > 0) {
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
                if (count($expressao) > 0) {
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

    /**
     * @param array $data
     * @return array
     */
    public function tratamentoCampos(array &$data)
    {
        # Tratamento de campos de chaves estrangeira
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $key2 => $value2) {
                    $explodeKey2 = explode("_", $key2);

                    if ($explodeKey2[count($explodeKey2) - 1] == "id" && $value2 == null) {
                        $data[$key][$key2] = null;
                    }
                }
            }

            $explodeKey = explode("_", $key);

            if ($explodeKey[count($explodeKey) - 1] == "id" && $value == null) {
                $data[$key] = null;
            }
        }

        #Retorno
        return $data;
    }

    /**
     * @return mixed
     */
    public function buscaAgencia()
    {
        #Consultado
        $agencia = \DB::table('agencias_callcenter')
            ->select([
                'agencias_callcenter.id',
                'agencias_callcenter.numero_agencia',
                'agencias_callcenter.nome_agencia',
            ])
            ->orderBy('numero_agencia')
            ->get();

        return $agencia;
    }
}
<?php

namespace MbCreditoCBO\Http\Controllers;

use Illuminate\Http\Request;
use MbCreditoCBO\Http\Requests;

/**
 * Class DashBoardController
 * @package MbCreditoCBO\Http\Controllers
 */
class DashBoardController extends Controller
{
    /**
     * @return mixed
     */
    public function index(Request $request)
    {
        # Recuperando o parêmatro da consulta
        $searchAgente = $request->get('searchAgente');

        # Recuperando os agentes
        $agentes = \MbCreditoCBO\Entities\Operador::lists('nome_operadores', 'id_operadores');

        # Array de retorno
        $dados = [
            'qtdContratosHoje'   => $this->getQtdContratosHoje($searchAgente),
            'qtdContratosSemana' => $this->getQtdContratosSemana($searchAgente),
            'qtdContratosMes'    => $this->getQtdContratosMes($searchAgente),
            'qtdContratosAno'    => $this->getQtdContratosAno($searchAgente),
            'chartContratosByMonth' => $this->getDataChartContratosByMonth($searchAgente)
        ];

        # Retorno para view
        return view('dashboard.index', compact('dados', 'agentes'));
    }

    /**
     * @return int
     */
    private function getQtdContratosHoje($searchAgente)
    {
        # Criando a query
        $query = \DB::table('chamadas')
            ->join('users', 'users.id', '=', 'chamadas.user_id')
            ->join('operadores', 'operadores.id_operadores', '=', 'users.id_operadores')
            ->where('chamadas.data_contratado', date('Y-m-d'))
            ->select([
                \DB::raw('count(chamadas.id) as qtd_contratos')
            ]);

        # Buscando por operador
        if($searchAgente) {
            $query->where('operadores.id_operadores', $searchAgente);
        }

        # Validando o retorno da query WEEK("2014/09/18")
        if(count(($result = $query->get())) > 0) {
            return $result[0]->qtd_contratos;
        }

        # Retorno
        return 0;
    }

    /**
     * @return int
     */
    private function getQtdContratosSemana($searchAgente)
    {
        # Criando a query
        $query = \DB::table('chamadas')
            ->join('users', 'users.id', '=', 'chamadas.user_id')
            ->join('operadores', 'operadores.id_operadores', '=', 'users.id_operadores')
            ->where(\DB::raw('WEEK(data_contratado,5) - WEEK(DATE_SUB(data_contratado, INTERVAL DAYOFMONTH(data_contratado)-1 DAY),5)+1'), date('w') +1)
            ->where(\DB::raw('MONTH(data_contratado)'), date('m'))
            ->where(\DB::raw('YEAR(data_contratado)'), date('Y'))
            ->select([
                \DB::raw('count(chamadas.id) as qtd_contratos')
            ]);

        # Buscando por operador
        if($searchAgente) {
            $query->where('operadores.id_operadores', $searchAgente);
        }

        # Validando o retorno da query WEEK("2014/09/18")
        if(count(($result = $query->get())) > 0) {
            return $result[0]->qtd_contratos;
        }

        # Retorno
        return 0;
    }

    /**
     * @return int
     */
    private function getQtdContratosMes($searchAgente)
    {
        # Criando a query
        $query = \DB::table('chamadas')
            ->join('users', 'users.id', '=', 'chamadas.user_id')
            ->join('operadores', 'operadores.id_operadores', '=', 'users.id_operadores')
            ->where(\DB::raw('MONTH(chamadas.data_contratado)'), date('m'))
            ->select([
                \DB::raw('count(chamadas.id) as qtd_contratos')
            ]);

        # Buscando por operador
        if($searchAgente) {
            $query->where('operadores.id_operadores', $searchAgente);
        }

        # Validando o retorno da query
        if(count(($result = $query->get())) > 0) {
            return $result[0]->qtd_contratos;
        }

        # Retorno
        return 0;
    }

    /**
     * @return int
     */
    private function getQtdContratosAno($searchAgente)
    {
        # Criando a query
        $query = \DB::table('chamadas')
            ->join('users', 'users.id', '=', 'chamadas.user_id')
            ->join('operadores', 'operadores.id_operadores', '=', 'users.id_operadores')
            ->where(\DB::raw('YEAR(chamadas.data_contratado)'), date('Y'))
            ->select([
                \DB::raw('count(chamadas.id) as qtd_contratos')
            ]);

        # Buscando por operador
        if($searchAgente) {
            $query->where('operadores.id_operadores', $searchAgente);
        }

        # Validando o retorno da query
        if(count(($result = $query->get())) > 0) {
            return $result[0]->qtd_contratos;
        }

        # Retorno
        return 0;
    }

    /**
     * @return mixed
     */
    public function getDataChartContratosByMonth($searchAgente)
    {
        # Array de meses do ano
        $arrayMonth = [['Janeiro', 0], ['Fevereiro', 0], ['Março', 0], ['Abril', 0], ['Maio', 0], ['Junho', 0],
            ['Julho', 0], ['Agosto', 0], ['Setembro', 0], ['outubro', 0], ['Novembro', 0], ['Dezembro', 0]];

        # Criando a query
        $query = \DB::table('chamadas')
            ->join('users', 'users.id', '=', 'chamadas.user_id')
            ->join('operadores', 'operadores.id_operadores', '=', 'users.id_operadores')
            ->where(\DB::raw('YEAR(chamadas.data_contratado)'), date('Y'))
            ->select([
                'chamadas.data_contratado'
            ]);

        # Buscando por operador
        if($searchAgente) {
            $query->where('operadores.id_operadores', $searchAgente);
        }

        # Validando o retorno da query
        if(count(($results = $query->get())) > 0) {
            foreach($results as $result) {
                # Convertendo para DateTime
                $dateTemp = \DateTime::createFromFormat('Y-m-d', $result->data_contratado);

                # Seleção do mês
                switch ((int) $dateTemp->format('m')) {
                    case 1: $arrayMonth[0][1] += 1; break;
                    case 2: $arrayMonth[1][1] += 1; break;
                    case 3: $arrayMonth[2][1] += 1; break;
                    case 4: $arrayMonth[3][1] += 1; break;
                    case 5: $arrayMonth[4][1] += 1; break;
                    case 6: $arrayMonth[5][1] += 1; break;
                    case 7: $arrayMonth[6][1] += 1; break;
                    case 8: $arrayMonth[7][1] += 1; break;
                    case 9: $arrayMonth[8][1] += 1; break;
                    case 10: $arrayMonth[9][1] += 1; break;
                    case 11: $arrayMonth[10][1] += 1; break;
                    case 12: $arrayMonth[11][1] += 1; break;
                }
            }
        }

        # Retorno
        return response()->json($arrayMonth);
    }

    /**
     * @return mixed
     */
    public function getDataChartContratosByYear($searchAgente)
    {
        # Array de meses do ano
        $arrayYear = [];

        # Criando os anos dinamicamente
        $yearNow = (int) date('Y');

        # Percorrendo os ultimos 10 anos
        $count = 0;
        for($i = ($yearNow - 10); $i <= $yearNow; $i++) {
            $arrayYear[$count][0] = $i;
            $arrayYear[$count][1] = 0;

            $count++;
        }

        # Criando a query
        $query = \DB::table('chamadas')
            ->join('users', 'users.id', '=', 'chamadas.user_id')
            ->join('operadores', 'operadores.id_operadores', '=', 'users.id_operadores')
            ->select([
                'chamadas.data_contratado',
                \DB::raw('count(chamadas.id) as qtd_contratos'),
            ]);

        # Buscando por operador
        if($searchAgente) {
            $query->where('operadores.id_operadores', $searchAgente);
        }

        # Validando o retorno da query
        if(count(($results = $query->get())) > 0) {
            foreach($results as $result) {
                # Convertendo para DateTime
                $dateTemp = \DateTime::createFromFormat('Y-m-d', $result->data_contratado);

                # Seleção do mês
                switch ((int) $dateTemp->format('Y')) {
                    case $arrayYear[0][0]: $arrayYear[0][1] += $result->qtd_contratos; break;
                    case $arrayYear[1][0]: $arrayYear[1][1] += $result->qtd_contratos; break;
                    case $arrayYear[2][0]: $arrayYear[2][1] += $result->qtd_contratos; break;
                    case $arrayYear[3][0]: $arrayYear[3][1] += $result->qtd_contratos; break;
                    case $arrayYear[4][0]: $arrayYear[4][1] += $result->qtd_contratos; break;
                    case $arrayYear[5][0]: $arrayYear[5][1] += $result->qtd_contratos; break;
                    case $arrayYear[6][0]: $arrayYear[6][1] += $result->qtd_contratos; break;
                    case $arrayYear[7][0]: $arrayYear[7][1] += $result->qtd_contratos; break;
                    case $arrayYear[8][0]: $arrayYear[8][1] += $result->qtd_contratos; break;
                    case $arrayYear[9][0]: $arrayYear[9][1] += $result->qtd_contratos; break;
                    case $arrayYear[10][0]: $arrayYear[10][1] += $result->qtd_contratos; break;
                }
            }
        }

        # Retorno
        return response()->json($arrayYear);
    }
}
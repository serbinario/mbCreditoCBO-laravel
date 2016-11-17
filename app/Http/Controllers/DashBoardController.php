<?php

namespace MbCreditoCBO\Http\Controllers;

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
    public function index()
    {
        # Array de retorno
        $dados = [
            'qtdContratosHoje'   => $this->getQtdContratosHoje(),
            'qtdContratosSemana' => $this->getQtdContratosSemana(),
            'qtdContratosMes'    => $this->getQtdContratosMes(),
            'qtdContratosAno'    => $this->getQtdContratosAno(),
            'chartContratosByMonth' => $this->getDataChartContratosByMonth()
        ];

        # Retorno para view
        return view('dashboard.index', compact('dados'));
    }

    /**
     * @return int
     */
    private function getQtdContratosHoje()
    {
        # Criando a query
        $query = \DB::table('chamadas')
            ->where('chamadas.data_contratado', date('Y-m-d'))
            ->select([
                \DB::raw('count(id) as qtd_contratos')
            ]);

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
    private function getQtdContratosSemana()
    {
        # Criando a query
        $query = \DB::table('chamadas')
            ->where(\DB::raw('FLOOR((DayOfMonth(chamadas.data_contratado)-1)/7)+1'), date('w'))
            ->select([
                \DB::raw('count(id) as qtd_contratos')
            ]);

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
    private function getQtdContratosMes()
    {
        # Criando a query
        $query = \DB::table('chamadas')
            ->where(\DB::raw('MONTH(chamadas.data_contratado)'), date('m'))
            ->select([
                \DB::raw('count(id) as qtd_contratos')
            ]);

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
    private function getQtdContratosAno()
    {
        # Criando a query
        $query = \DB::table('chamadas')
            ->where(\DB::raw('YEAR(chamadas.data_contratado)'), date('Y'))
            ->select([
                \DB::raw('count(id) as qtd_contratos')
            ]);

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
    public function getDataChartContratosByMonth()
    {
        # Array de meses do ano
        $arrayMonth = [['Janeiro', 0], ['Fevereiro', 0], ['Março', 0], ['Abril', 0], ['Maio', 0], ['Junho', 0],
            ['Julho', 0], ['Agosto', 0], ['Setembro', 0], ['outubro', 0], ['Novembro', 0], ['Dezembro', 0]];

        # Criando a query
        $query = \DB::table('chamadas')
            ->where(\DB::raw('YEAR(chamadas.data_contratado)'), date('Y'))
            ->select([
                'chamadas.data_contratado',
                \DB::raw('count(id) as qtd_contratos'),
            ]);

        # Validando o retorno da query
        if(count(($results = $query->get())) > 0) {
            foreach($results as $result) {
                # Convertendo para DateTime
                $dateTemp = \DateTime::createFromFormat('Y-m-d', $result->data_contratado);

                # Seleção do mês
                switch ((int) $dateTemp->format('m')) {
                    case 1: $arrayMonth[0][1] += $result->qtd_contratos; break;
                    case 2: $arrayMonth[1][1] += $result->qtd_contratos; break;
                    case 3: $arrayMonth[2][1] += $result->qtd_contratos; break;
                    case 4: $arrayMonth[3][1] += $result->qtd_contratos; break;
                    case 5: $arrayMonth[4][1] += $result->qtd_contratos; break;
                    case 6: $arrayMonth[5][1] += $result->qtd_contratos; break;
                    case 7: $arrayMonth[6][1] += $result->qtd_contratos; break;
                    case 8: $arrayMonth[7][1] += $result->qtd_contratos; break;
                    case 9: $arrayMonth[8][1] += $result->qtd_contratos; break;
                    case 10: $arrayMonth[9][1] += $result->qtd_contratos; break;
                    case 11: $arrayMonth[10][1] += $result->qtd_contratos; break;
                    case 12: $arrayMonth[11][1] += $result->qtd_contratos; break;
                }
            }
        }

        # Retorno
        return response()->json($arrayMonth);
    }

    /**
     * @return mixed
     */
    public function getDataChartContratosByYear()
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
            ->select([
                'chamadas.data_contratado',
                \DB::raw('count(id) as qtd_contratos'),
            ]);

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
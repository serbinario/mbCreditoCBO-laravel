@extends('menu')

@section('css')
@endsection

@section('content')
    <section id="content">
        <div class="container">
            <div class="mini-charts">
                <div class="topo-conteudo-full">
                    <h4>Nº de Contratos</h4>
                </div>

                <form id="search-form" role="form" method="GET">
                    <div class="row">
                        <div class="form-group col-sm-3">
                            <div class=" fg-line">
                                <label for="searchMes"></label>
                                <div class="select" style="background-color: white">
                                    {!! Form::select('searchAgente', (['' => 'Todos os agentes'] + $agentes->toArray()), null, array('class'=> 'chosen form-control input-sm')) !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-2 m-t-15">
                            <button type="submit" class="btn btn-primary btn-sm m-t-10" id="btnConsultar" href="#">Consultar</button>
                        </div>
                    </div>
                </form>


                <div class="topo-conteudo-full">
                    <h4>Nº de Contratos</h4>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <div class="mini-charts-item bgm-lightgreen">
                            <div class="clearfix">
                                <div class="chart stats-bar"></div>
                                <div class="count">
                                    <small>Hoje</small>
                                    <h2>{{ $dados['qtdContratosHoje'] }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="mini-charts-item bgm-purple">
                            <div class="clearfix">
                                <div class="chart stats-bar-2"></div>
                                <div class="count">
                                    <small>Semanal</small>
                                    <h2>{{ $dados['qtdContratosSemana'] }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="mini-charts-item bgm-orange">
                            <div class="clearfix">
                                <div class="chart stats-line"></div>
                                <div class="count">
                                    <small>Mensal</small>
                                    <h2>{{ $dados['qtdContratosMes'] }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="mini-charts-item bgm-bluegray">
                            <div class="clearfix">
                                <div class="chart stats-line-2"></div>
                                <div class="count">
                                    <small>Anual</small>
                                    <h2>{{ $dados['qtdContratosAno'] }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="topo-conteudo-full">
                <h4>Relatórios</h4>
            </div>

            <div class="card">
                <div class="card-header">
                    <h2>Relatório de Contratos (Mensal) {{ date('Y') }}<small>Quantidade de contratos por mês</small></h2>
                </div>
                <div class="card-body card-padding-sm">
                    <div id="bar-chart" class="flot-chart"></div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h2>Relatório de Contratos (Anual)<small>Quantidade de contratos por Ano</small></h2>
                </div>
                <div class="card-body card-padding-sm">
                    <div id="flot-chart" class="flot-chart"></div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
    <script src="{{ asset('/lib/Flot/jquery.flot.js')}}"></script>
    <script src="{{ asset('/lib/Flot/jquery.flot.resize.js')}}"></script>
    <script src="{{ asset('/lib/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{ asset('/lib/Flot/jquery.flot.categories.js')}}"></script>
    <script src="{{ asset('/lib/flot.curvedlines/curvedLines.js')}}"></script>
    <script src="{{ asset('/lib/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{ asset('/lib/Flot/jquery.flot.time.js')}}"></script>
    <script src="{{ asset('/dist/js/sparklines/jquery.sparkline.min.js')  }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Relatório de Contratos por Mês
            $.getJSON( "{{ route('dashboard.chartContratosByMonth') }}", function( data ) {
                $.plot("#bar-chart", [data], {
                    colors: ["#00BCD4"],
                    series: {
                        bars: {
                            show: true,
                            barWidth: 0.6,
                            align: "center"
                        }
                    },
                    xaxis: {
                        mode: "categories",
                        tickLength: 0
                    },
                    grid : {
                        borderWidth: 1,
                        borderColor: '#eee',
                        show : true,
                        hoverable : false,
                        clickable : false
                    },
                    bars: {
                        show: true,
                        barWidth: 0.5,
                        order: 1,
                        fill: 1
                    }
                });
            });

            // Relatório de cotratos por ano
            $.getJSON("{{ route('dashboard.chartContratosByYear') }}", function (json) {
                var options = {
                    colors: ["#00BCD4"],
                    grid : {
                        borderWidth: 1,
                        borderColor: '#eee',
                        show : true,
                        hoverable : false,
                        clickable : false
                    },
                    lines: {
                        show: true
                    },
                    points: {
                        show: true
                    },
                    xaxis: {
                        tickDecimals: 0,
                        tickSize: 1
                    }
                };

                $.plot("#flot-chart", [json], options);
            });
        });
    </script>
@endsection
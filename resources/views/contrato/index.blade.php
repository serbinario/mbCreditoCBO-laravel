@extends('menu')

@section("css")
    <style type="text/css">
        td.details-control {
            background: url("{{asset("imagemgrid/icone-produto-plus.png")}}") no-repeat center center;
            cursor: pointer;
        }

        tr.details td.details-control {
            background: url("{{asset("imagemgrid/icone-produto-minus.png")}}") no-repeat center center;
        }

        .date_alert {
            background-color: #ccccff;
        }
    </style>
@stop

@section('content')
    <section id="content">
        <div class="container">

            <div class="block-header">
                <h2>Listar Contratos</h2>
            </div>

            <div class="card material-table">
                <div class="card-header">
                    <!-- Botão novo -->
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="text-right">
                                <a class="btn btn-primary btn-sm m-t-10" href="{{ route('contrato.create')  }}">Novo Cliente</a>
                            </div>
                        </div>
                    </div>
                    <!-- Botão novo -->
                </div>

                <div class="card-body card-padding">
                    <div class="topo-conteudo-full">
                        <h4>Filtros Avançados:</h4>
                    </div>

                    <form id="search-form" role="form" method="GET">
                        <div class="row">
                            <div class="form-group col-sm-3">
                                <div class=" fg-line">
                                    <label for="searchMes"></label>
                                    <div class="select">
                                        {!! Form::select('searchMes', $meses, date('m'), array('class'=> 'chosen form-control input-sm')) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-sm-2">
                                <div class=" fg-line">
                                    <label for="searchDataIni"></label>
                                    {!! Form::text('searchDataIni', null, array('id' => 'searchDataIni', 'class' => 'form-control dateTimePicker input-sm', 'placeholder' => 'Data Inicial')) !!}
                                </div>
                            </div>

                            <div class="form-group col-sm-2">
                                <div class=" fg-line">
                                    <label for="searchCpf"></label>
                                    {!! Form::text('searchDataFin', null, array('id' => 'searchDataFin', 'class' => 'form-control dateTimePicker input-sm', 'placeholder' => 'Data Final')) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-3">
                                <div class=" fg-line">
                                    <label for="searchMes"></label>
                                    <div class="select">
                                        {!! Form::select('searchAgente', (['' => 'Todos os agentes'] + $agentes->toArray()), null, array('class'=> 'chosen form-control input-sm')) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-sm-2">
                                <div class=" fg-line">
                                    <label for="searchGlobal"></label>
                                    {!! Form::text('searchGlobal', null, array('id' => 'searchGlobal', 'class' => 'form-control input-sm', 'placeholder' => 'Pesquisar ...')) !!}
                                </div>
                            </div>

                            <div class="col-sm-2 m-t-15">
                                <button type="submit" class="btn btn-primary btn-sm m-t-10" id="btnConsultar" href="#">Consultar</button>
                            </div>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table id="contrato-grid" class="table table-hover">
                            <thead>
                            <tr>
                                <th>Detalhe</th>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Agência</th>
                                <th>Nº da Conta</th>
                                <th>Telefone</th>
                                <th>Açao</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Detalhe</th>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Agência</th>
                                <th>Nº da Conta</th>
                                <th>Telefone</th>
                                <th>Açao</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section>

@stop

@section('javascript')
    <script type="text/javascript">
        var table = $('#contrato-grid').DataTable({
            processing: true,
            serverSide: true,
            createdRow: function ( row, data, index ) {

                if(data.hasOwnProperty('contratos')) {
                    // Convertendo para json
                    var contratos = JSON.parse(data.contratos);

                    // Tratando a data
                    for(var i = 0; i < contratos.length; i++) {
                        var arrayDate = contratos[i].data_prox_chamada.split("/");
                        var dateBase  = new Date(arrayDate[2], arrayDate[1], arrayDate[0]);

                        // Recuperando a data atual
                        var dateNow   = new Date();

                        // vendo se a data da chamada é atual
                        if(dateBase.getDate() == dateNow.getDate()) {
                            $(row).find('td').addClass('date_alert');
                        }
                    }
                }
            },
            ajax: {
                url: "{!! route('contrato.grid') !!}",
                data: function (d) {
                    d.mes = $('select[name=searchMes] option:selected').val();
                    d.agente  = $('select[name=searchAgente] option:selected').val();
                    d.dataIni = $('input[name=searchDataIni]').val();
                    d.dataFin = $('input[name=searchDataFin]').val();
                    d.global  = $('input[name=searchGlobal]').val();
                }
            },
            bFilter: false,
            columns: [
                {
                    "className":      'details-control',
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ''
                },
                {data: 'name', name: 'clientes.name'},
                {data: 'cpf', name: 'clientes.cpf'},
                {data: 'numero_agencia', name: 'agencias.numero_agencia'},
                {data: 'conta', name: 'clientes.conta'},
                {data: 'telefone', name: 'telefones.telefone'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
            /*"oLanguage": {
                "sStripClasses": "",
                "sSearch": "",
                "sSearchPlaceholder": "Enter Keywords Here",
                "sInfo": "_START_ - _END_ de _TOTAL_",
                "sLengthMenu": '<span>Linhas por Página:</span><select class="browser-default">' +
                '<option value="10">10</option>' +
                '<option value="20">20</option>' +
                '<option value="30">30</option>' +
                '<option value="40">40</option>' +
                '<option value="50">50</option>' +
                '<option value="-1">All</option>' +
                '</select></div>'
            },*/
        });

        // Função do submit do search da grid principal
        $('#btnConsultar').click(function(e) {
            table.draw();
            e.preventDefault();
        });

        // Variável detalhes das linhas
        var detailRows = [];

        // evento para criação dos detalhes da grid
        $('#contrato-grid').on( 'click', 'tr td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row( tr );
            var idx = $.inArray( tr.attr('id'), detailRows );

            if ( row.child.isShown() ) {
                tr.removeClass( 'details' );
                row.child.hide();

                // Remove from the 'open' array
                detailRows.splice( idx, 1 );
            }
            else {
                tr.addClass( 'details' );
                row.child( formatDetail( row.data() ) ).show();

                // Add to the 'open' array
                if ( idx === -1 ) {
                    detailRows.push( tr.attr('id') );
                }
            }
        });

        // On each draw, loop over the `detailRows` array and show any child rows
        table.on( 'draw', function () {
            $.each( detailRows, function ( i, id ) {
                $('#'+id+' td.details-control').trigger( 'click' );
            } );
        } );
        // Função de formatação do detalhe
        function formatDetail(d) {
            // Transformando em json
            var contratos = JSON.parse(d.contratos);

            // Criando html de retorno
            var html =  '<table class="table-responsible">' +
                            '<thead>' +
                            '<tr>' +
                                '<th>Prazo</th>' +
                                '<th>Valor Contratado</th>' +
                                '<th>Data da contratação</th>' +
                                '<th>Tipo contratação</th>' +
                                '<th>Convênio</th>' +
                                '<th>Nº do contrato</th>' +
                                '<th>Data da religação</th>' +
                                '<th>Link Contrato</th>' +
                                @if(!Auth::user()->is('ROLE_OPERADOR'))
                                    '<th>Operador</th>' +
                                @endif
                            '</tr>' +
                            '</thead>';

            // Percorrendo os contratos e meintando o body da table
            for(var i = 0; i < contratos.length; i++) {
                html += '<tr>' +
                            '<td>'+ contratos[i].prazo +'</td>' +
                            '<td>'+ contratos[i].valor_contratado + '</td>' +
                            '<td>'+ contratos[i].data_contratado + '</td>' +
                            '<td>'+ contratos[i].tipo_contrato.tipo_contrato + '</td>' +
                            '<td>'+ contratos[i].convenio.nome_convenio + '</td>' +
                            '<td>'+ contratos[i].codigo_transacao + '</td>' +
                            '<td>'+ contratos[i].data_prox_chamada + '</td>' +
                            '<td>'+ (contratos[i].path_arquivo ?
                                    '<a target="_blank" href="/mbCreditoCBO-laravel/public/index.php/contrato/viewContrato/' + contratos[i].id + '">Visualizar</a>' : '') +
                            '</td>' +
                            @if(!Auth::user()->is('ROLE_OPERADOR'))
                                '<td>'+ contratos[i].usuario.username + '</td>' +
                            @endif
                        '</tr>';
            }

            // Finalizando o html
            html += '</table>';

            // Retornando o html
            return html;
        }

    </script>
@stop
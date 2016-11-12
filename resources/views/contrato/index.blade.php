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
    </section>

@stop

@section('javascript')
    <script type="text/javascript">
        var table = $('#contrato-grid').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{!! route('contrato.grid') !!}",
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
                        '</tr>';
            }

            // Finalizando o html
            html += '</table>';

            // Retornando o html
            return html;
        }

    </script>
@stop
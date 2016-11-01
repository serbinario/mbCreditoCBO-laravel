@extends('menu')

@section('content')
    <section id="content">
        <div class="container">
            {{--<div class="block-header">--}}
            {{--<h2>Data Table</h2>--}}
            {{--</div>--}}

            <div class="card material-table">
                <div class="card-header">
                    <h2>Lista de Operadores
                        {{--<small>It's just that simple. Turn your simple table into a sophisticated data table and--}}
                        {{--offer your users a nice experience and great features without any effort.--}}
                        {{--</small>--}}
                    </h2>
                </div>

                <div class="table-responsive">
                    <table id="contrato-grid" class="table table-hover">
                        <thead>
                        <tr>
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
        console.log('teste');
        var table = $('#contrato-grid').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{!! route('contrato.grid') !!}",
            columns: [
                {data: 'name', name: 'clientes.name'},
                {data: 'cpf', name: 'clientes.cpf'},
                {data: 'numero_agencia', name: 'agencias_callcenter.numero_agencia'},
                {data: 'conta', name: 'clientes.conta'},
                {data: 'telefone', name: 'telefones.telefone'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            "oLanguage": {
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
            },
        });
    </script>
@stop
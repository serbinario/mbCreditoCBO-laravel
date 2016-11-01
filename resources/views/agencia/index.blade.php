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
                    <table id="agencia-grid" class="table table-hover">
                            <thead>
                            <tr>
                                <th>Número da Agência</th>
                                <th>Nome da Agência</th>
                                <th>Açao</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>Número da Agência</th>
                                <th>Nome da Agência</th>
                                <th>Açao</th>
                            </tr>
                            <tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </section>
@stop

@section('javascript')
    <script type="text/javascript">
        var table = $('#agencia-grid').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{!! route('agencia.grid') !!}",
            columns: [
                {data: 'numero_agencia', name: 'agencias_callcenter.numero_agencia'},
                {data: 'nome_agencia', name: 'agencias_callcenter.nome_agencia'},
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
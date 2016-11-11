@extends('menu')

@section('content')
    <section id="content">
        <div class="container">
            <div class="card material-table">
                <div class="card-header">
                    <h2>Listar Agências</h2>

                    <!-- Botão novo -->
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="text-right">
                                <a class="btn btn-primary btn-sm m-t-10" href="{{route ('agencia.create') }}">Nova Agencia</a>
                            </div>
                        </div>
                    </div>
                    <!-- Botão novo -->

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
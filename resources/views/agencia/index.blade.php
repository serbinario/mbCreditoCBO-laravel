@extends('menu')

@section('content')

    <div class="container">
        <div class="col m6 s12">
            <div class="card material-table" style="margin: 20px auto; padding:20px;">
            {{--<h3 class="box-title">Consultar Agente</h3>--}}
            {{--<!-- inicio botao -->--}}
            {{--<div class="row">--}}
            {{--<div class="col-md-12">--}}
            {{--<div class="col-sm-6 col-md-12 ">--}}
            {{--<a href="{{ route('contrato.create')}}" class="btn-sm btn-primary pull-right">Novo Cliente</a>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            <!-- fim botao -->

                <div class="table-header">
                    <span class="table-title">Consultar Agencia</span>
                    <div class="actions">
                        <a href="{{ route('agencia.create')}}" class="modal-trigger waves-effect btn-flat nopadding"><i class="material-icons">person_add</i></a>
                        <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <table id="agencia-grid" cellspacing="0" width="100%">
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
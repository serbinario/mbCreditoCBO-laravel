@extends('menu')

@section('content')
    <div class="container">
        <div class="col m6 s12">
            <div class="card material-table" style="margin: 20px auto; padding:20px;">
                <h3 class="box-title">Consultar Agente</h3>
                <!-- inicio botao -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-sm-6 col-md-12 ">
                            <a href="{{ route('operador.create')}}" class="btn-sm btn-primary pull-right">Novo Cliente</a>
                        </div>
                    </div>
                </div>
                <!-- fim botao -->

                <div class="table-header">
                    <span class="table-title">Material Datatable</span>
                    <div class="actions">
                        <a href="#add_users" class="modal-trigger waves-effect btn-flat nopadding"><i class="material-icons">person_add</i></a>
                        <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <table id="datatable" >
                            <thead>
                            <tr>
                                <th>Chave J</th>
                                <th>Nome</th>
                                <th>Açao</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>Chave J</th>
                                <th>Nome</th>
                                <th>Açao</th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('javascript')
    <script type="text/javascript">

        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{!! route('operador.grid') !!}",
            columns: [
                {data: 'cod_operadores', name: 'operadores.cod_operadores'},
                {data: 'nome_operadores', name: 'operadores.nome_operadores'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            "oLanguage": {
                "sStripClasses": "",
                "sSearch": "",
                "sSearchPlaceholder": "Enter Keywords Here",
                "sInfo": "_START_ -_END_ of _TOTAL_",
                "sLengthMenu": '<span>Rows per page:</span><select class="browser-default">' +
                '<option value="10">10</option>' +
                '<option value="20">20</option>' +
                '<option value="30">30</option>' +
                '<option value="40">40</option>' +
                '<option value="50">50</option>' +
                '<option value="-1">All</option>' +
                '</select></div>'
            },
        });
       // $('select').material_select();
    </script>
@stop
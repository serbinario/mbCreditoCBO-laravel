@extends('menu')

@section('content')
    <section id="content">
    <div class="container">
        <div class="block-header">
            <h2>Listar Agentes</h2>
        </div>
        <div class="card material-table">
            <div class="card-header">


                <!-- Botão novo -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="text-right">
                            <a class="btn btn-primary btn-sm m-t-10" href="{{ route ('operador.create') }}">Novo Agente</a>
                        </div>
                    </div>
                </div>
                <!-- Botão novo -->

            </div>

            <div class="table-responsive">
                <table id="grid-operador" class="table table-hover">
                    <thead>
                    <tr>
                        <th>Chave J</th>
                        <th>Nome</th>
                        <th>Açao</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Chave J</th>
                        <th>Nome</th>
                        <th>Açao</th>
                    </tr>
                    </tfoot>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
    </section>
@stop

@section('javascript')
    <script type="text/javascript">

        var table = $('#grid-operador').DataTable({
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
                "sSearchPlaceholder": "Digite um agente",
                "sInfo": "_START_ - _END_ de _TOTAL_",
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
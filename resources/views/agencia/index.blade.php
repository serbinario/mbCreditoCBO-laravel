@extends('menu')

@section('content')

    <div class="container">
        <div class="col m6 s12">
            <div class="card-panel">
                <h3 class="box-title">Consultar Agente</h3>
                <!-- inicio botao -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-sm-6 col-md-12 ">
                            <a href="{{ route('agencia.create')}}" class="btn-sm btn-primary pull-right">Novo Cliente</a>
                        </div>
                    </div>
                </div>
                <!-- fim botao -->
                <div class="row">
                    <div class="col-md-12">
                        <table id="agencia-grid" class="display table table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Número da Agência</th>
                                <th>Nome da Agência</th>
                                <th>Açao</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Número da Agência</th>
                                <th>Nome da Agência</th>
                                <th>Açao</th>
                            </tr>
                            </tfoot>
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
            ]
        });
    </script>
@stop
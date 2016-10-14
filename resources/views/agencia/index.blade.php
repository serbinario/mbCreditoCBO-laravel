@extends('menu')

@section('content')

<div class="container">
    <div class="col m6 s12">
        <div class="card-panel">
            <!-- Inicio sub titulo -->
            <div class="box-header with-border">
                <h3 class="box-title">Consultar Agência</h3>
            </div>
            <!-- Inicio sub titulo -->
            <div class="box-body">
                {{--<div class="ibox-content">--}}
                <div class="col-md-12">
                    <section>
                        <!-- inicio botao -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-sm-6 col-md-12 ">
                                    <a href="{{ route('agencia.create')}}" class="btn-sm btn-primary pull-right">Novo Agente</a>
                                </div>
                            </div>
                        </div>
                        <!-- fim botao -->
                        <div class="row">
                            <div class="col-md-12">
                                {{--<div class="table-responsive no-padding">--}}
                                <table id="agencia-grid" class="display table table-bordered" cellspacing="0" width="100%">
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
                                </table>
                                {{--</div>--}}
                            </div>
                        </div>
                    </section>
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
                {data: 'cod_operadores', name: 'operadores.cod_operadores'},
                {data: 'nome_operadores', name: 'operadores.nome_operadores'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    </script>
@stop
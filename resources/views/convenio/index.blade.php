@extends('menu')

@section('content')

    <div class="container">
        <div class="col m6 s12">
            <div class="card-panel">
                <h3 class="box-title">Consultar Convênio</h3>
                <!-- inicio botao -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-sm-6 col-md-12 ">
                            <a href="{{ route('convenio.create')}}" class="btn-sm btn-primary pull-right">Novo Cliente</a>
                        </div>
                    </div>
                </div>
                <!-- fim botao -->
                <div class="row">
                    <div class="col-md-12">
                        <table id="convenio-grid" class="display table table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Açao</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Nome</th>
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
        var table = $('#convenio-grid').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{!! route('convenio.grid') !!}",
            columns: [
                {data: 'nome_convenio', name: 'convenios_callcenter.nome_convenio'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    </script>
@stop
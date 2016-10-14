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
                        <a href="{{ route('contrato.create')}}" class="btn-sm btn-primary pull-right">Novo Cliente</a>
                    </div>
                </div>
            </div>
            <!-- fim botao -->
            <div class="row">
                <div class="col-md-12">
                    <table id="contrato-grid" class="display table table-bordered" cellspacing="0" width="100%">
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
    </div>
</div>

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
            ]
        });
    </script>
@stop
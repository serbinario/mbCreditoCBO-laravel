@extends('menu')
{{dd('Entrou no index')}}
{{--@section('content')--}}

{{--<div class="container">--}}
    {{--<div class="col m6 s12">--}}
        {{--<div class="card-panel">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-12">--}}
                    {{--<table id="contrato-grid" class="display table table-bordered" cellspacing="0" width="100%">--}}
                        {{--<thead>--}}
                        {{--<tr>--}}
                            {{--<th>Nome</th>--}}
                            {{--<th>CPF</th>--}}
                            {{--<th>Agência</th>--}}
                            {{--<th>Nº da Conta</th>--}}
                            {{--<th>Telefone</th>--}}
                            {{--<th>Açao</th>--}}
                        {{--</tr>--}}
                        {{--</thead>--}}
                        {{--<tfoot>--}}
                        {{--<tr>--}}
                            {{--<th>Nome</th>--}}
                            {{--<th>CPF</th>--}}
                            {{--<th>Agência</th>--}}
                            {{--<th>Nº da Conta</th>--}}
                            {{--<th>Telefone</th>--}}
                            {{--<th>Açao</th>--}}
                        {{--</tr>--}}
                        {{--</tfoot>--}}
                    {{--</table>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--@stop--}}

{{--@section('javascript')--}}
    {{--<script type="text/javascript">--}}
        {{--console.log('teste');--}}
        {{--var table = $('#contrato-grid').DataTable({--}}
            {{--processing: true,--}}
            {{--serverSide: true,--}}
            {{--ajax: "{!! route('contrato.grid') !!}",--}}
            {{--columns: [--}}
                {{--{data: 'nome', name: 'clientes.nome'},--}}
                {{--{data: 'cpf', name: 'clientes.cpf'},--}}
                {{--{data: 'numero_agencia', name: 'agencias_callcenter.numero_agencia'},--}}
                {{--{data: 'conta', name: 'clientes.conta'},--}}
                {{--{data: 'telefone', name: 'telefones.telefone'},--}}
                {{--{data: 'action', name: 'action', orderable: false, searchable: false}--}}
            {{--]--}}
        {{--});--}}
    {{--</script>--}}
{{--@stop--}}
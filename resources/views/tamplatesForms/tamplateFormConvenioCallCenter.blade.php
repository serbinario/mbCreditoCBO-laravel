<div class="block-header">
    <h2>Cadastro de Convênios</h2>

</div>
<div class="card">
    <div class="card-body card-padding">
        <div class="topo-conteudo-full">
            <h4>Dados do Convênio</h4>
        </div>
        <div class="form-group">
            <div class="fg-line">
                <label for="nome_convenio">Nome:</label>
                {!! Form::text('nome_convenio', Session::getOldInput('nome_convenio'), array('class' => 'form-control input-sm', 'placeholder' => 'Nome do Convênio')) !!}
            </div>
        </div>

        <button class="btn btn-primary btn-sm m-t-10">Salvar</button>
        <a class="btn btn-primary btn-sm m-t-10" href="{{ route('convenio.index') }}">Voltar</a>
    </div>
</div>

@section('javascript')
    {{--Mensagens personalizadas--}}
    <script type="text/javascript" src="{{ asset('/dist/js/messages_pt_BR.js')  }}"></script>
    {{--Regras adicionais--}}
    <script type="text/javascript" src="{{ asset('/dist/js/adicional/alphaSpace.js')  }}"></script>
    {{--Regras de validação--}}
    {{--Regras de validação--}}
    {{--<script type="text/javascript" src="{{ asset('/dist/js/validacao/convenio.js')  }}"></script>--}}
@endsection
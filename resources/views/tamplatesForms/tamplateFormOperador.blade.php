<div class="block-header">
    <h2>Cadastro de Agentes</h2>
</div>

<div class="card">
    <div class="card-body card-padding">
        <div class="topo-conteudo-full">
            <h4>Dados do Agente</h4>
        </div>

        <div class="row">
            <div class="form-group col-sm-4">
                <div class="fg-line">
                    <label class="control-label" for="nome_operadores">Nome</label>
                    {!! Form::text('nome_operadores', Session::getOldInput('nome_operadores'), array('class' => 'form-control input-sm', 'placeholder' => 'Nome Completo')) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-4">
                <div class="fg-line">
                    <label class="control-label" for="cod_operadores">Chave J</label>
                    {!! Form::text('cod_operadores', Session::getOldInput('cod_operadores'), array('class' => 'form-control input-sm', 'placeholder' => 'Chave J')) !!}
                </div>
            </div>
        </div>

            <button type="submit" class="btn btn-primary btn-sm m-t-10">Salvar</button>
            <a class="btn btn-primary btn-sm m-t-10" href="{{ route('operador.index') }}">Voltar</a>

    </div>
</div>

@section('javascript')
    {{--Mensagens personalizadas--}}
    <script type="text/javascript" src="{{ asset('/dist/js/messages_pt_BR.js')  }}"></script>
    {{--Regras adicionais--}}
    <script type="text/javascript" src="{{ asset('/lib/jquery-validation/src/additional/alphanumeric.js')  }}"></script>
    <script type="text/javascript" src="{{ asset('/dist/js/adicional/alphaSpace.js')  }}"></script>
    <script type="text/javascript" src="{{ asset('/dist/js/adicional/chaveJ.js')  }}"></script>
    {{--Regras de validação--}}
    <script type="text/javascript" src="{{ asset('/dist/js/validacao/operador.js')  }}"></script>
@endsection



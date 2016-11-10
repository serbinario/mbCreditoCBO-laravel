<div class="card">
    <div class="card-header">
    </div>

    <div class="card-body card-padding">
        <div class="row">
            <div class="form-group col-sm-4">
                <div class="fg-line">
                    <label for="numero_agencia">Número: </label>
                    {!! Form::text('numero_agencia', Session::getOldInput('numero_agencia'), array('class' => 'form-control input-sm', 'placeholder' => 'Número da agência')) !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-4">
                <div class="fg-line">
                    <label for="nome_agencia">Nome: </label>
                    {!! Form::text('nome_agencia', Session::getOldInput('nome_agencia'), array('class' => 'form-control input-sm', 'placeholder' => 'Nome da agência')) !!}
                </div>
            </div>
        </div>

        <button class="btn btn-primary btn-sm m-t-10">Salvar</button>
        <a class="btn btn-primary btn-sm m-t-10" href="http://ser.cbo/index.php/agencia/index">Voltar</a>
        
    </div>
</div>

@section('javascript')
    {{--Mensagens personalizadas--}}
    <script type="text/javascript" src="{{ asset('/dist/js/messages_pt_BR.js')  }}"></script>
    {{--Regras adicionais--}}
    <script type="text/javascript" src="{{ asset('/lib/jquery-validation/src/additional/alphanumeric.js')  }}"></script>
    <script type="text/javascript" src="{{ asset('/dist/js/adicional/alphaSpace.js')  }}"></script>
    <script type="text/javascript" src="{{ asset('/dist/js/adicional/bankBr.js')  }}"></script>
    <script type="text/javascript" src="{{ asset('/lib/jquery-validation/src/additional/integer.js')  }}"></script>
    {{--Regras de validação--}}
    <script type="text/javascript" src="{{ asset('/dist/js/validacao/agencia.js')  }}"></script>
@endsection
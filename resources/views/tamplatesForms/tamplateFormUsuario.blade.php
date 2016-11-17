<div class="block-header">
    <h2>Cadastro de Usuário</h2>

</div>
<div class="card">


    <div class="card-body card-padding">
        <div class="topo-conteudo-full">
            <h4>Dados do Usuário</h4>
        </div>

        <div class="form-group">
            <div class=" fg-line">
                <label for="username">Login: </label>
                {!! Form::text('username', old('username'), array('class' => 'form-control input-sm', 'placeholder' => 'Nome de usuário')) !!}
            </div>
        </div>

        <div class="form-group">
            <div class=" fg-line">
                <label for="password">Senha: </label>
                {!! Form::password('password', array('class' => 'form-control input-sm', 'placeholder' => 'Senha')) !!}
            </div>
        </div>

        <div class="form-group">
            <div class=" fg-line">
                <label for="email">E-mail: </label>
                {!! Form::text('email', old('email'), array('class' => 'form-control input-sm', 'placeholder' => 'E-mail')) !!}
            </div>
        </div>

        <label>Permissão:</label>
        </br>
        <div class="form-group">
            <label for="opcao1" class="checkbox checkbox-inline m-r-20">
                {!! Form::checkbox('userHole[opcaoOperador]', 1, isset($rolePermission['roleOperador']) ?? null, ['id' => 'opcao1']) !!}
                <i class="input-helper"></i>
                OPERADOR
            </label>
         <label for="opcao2" class="checkbox checkbox-inline m-r-20">
                {!! Form::checkbox('userHole[opcaoAdmin]', 2, isset($rolePermission['roleAdmin']) ?? null, ['id' => 'opcao2']) !!}
                <i class="input-helper"></i>
                ADMIN
            </label>
         <label for="opcao3" class="checkbox checkbox-inline m-r-20">
                {!! Form::checkbox('userHole[opcaoGerente]', 3, isset($rolePermission['roleGerente']) ?? null, ['id' => 'opcao3']) !!}
                <i class="input-helper"></i>
                GERENTE
            </label>
        </div>

        <div class="form-group">
            <div class="fg-line">
                <label for="id_operadores">Operador</label>
                <div class="select">
                    {!! Form::select('id_operadores', ([$loadFields['operador']->toArray()]), null, array('class'=> 'form-control')) !!}
                </div>
            </div>
        </div>

        <button class="btn btn-primary btn-sm m-t-10">Salvar</button>
        <a class="btn btn-primary btn-sm m-t-10" href="{{ route('usuario.index') }}"">Voltar</a>

    </div>
</div>

@section('javascript')
    {{--Mensagens personalizadas--}}
    <script type="text/javascript" src="{{ asset('/dist/js/messages_pt_BR.js')  }}"></script>
    {{--Regras adicionais--}}
    <script type="text/javascript" src="{{ asset('/lib/jquery-validation/src/additional/alphanumeric.js')  }}"></script>
    <script type="text/javascript" src="{{ asset('/lib/jquery-validation/src/additional/integer.js')  }}"></script>
    <script type="text/javascript" src="{{ asset('/dist/js/adicional/chaveJ.js')  }}"></script>
    <script type="text/javascript" src="{{ asset('/dist/js/adicional/alphaSpace.js')  }}"></script>
    {{--Regras de validação--}}
    <script type="text/javascript" src="{{ asset('/dist/js/validacao/usuario.js')  }}"></script>
@endsection
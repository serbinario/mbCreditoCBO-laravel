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
                @if(isset($model))
                    {!! Form::text('username', old('username'), array('class' => 'form-control input-sm', 'placeholder' => 'Nome de usuário', 'readonly' => 'readonly')) !!}
                @else
                    {!! Form::text('username', old('username'), array('class' => 'form-control input-sm', 'placeholder' => 'Nome de usuário')) !!}
                @endif

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

        @if(Auth::user()->is('ROLE_ADMIN') || Auth::user()->is('ROLE_GERENTE'))
            <label>Nível de permissão:</label>
            </br>
            <div class="form-group">
                <label for="opcao1" class="checkbox checkbox-inline m-r-20">
                    {{--{!! Form::hidden('userHole[opcaoOperador]', 0) !!}--}}
                    {!! Form::checkbox('userHole[opcaoOperador]', 1, isset($rolePermission['roleOperador']) ? $rolePermission['roleOperador'] : null, ['id' => 'opcao1']) !!}
                    <i class="input-helper"></i>
                    OPERADOR
                </label>
                <label for="opcao2" class="checkbox checkbox-inline m-r-20">
                    {!! Form::checkbox('userHole[opcaoAdmin]', 2, isset($rolePermission['roleAdmin']) ? $rolePermission['roleAdmin'] : null, ['id' => 'opcao2']) !!}
                    <i class="input-helper"></i>
                    ADMIN
                </label>
                <label for="opcao3" class="checkbox checkbox-inline m-r-20">
                    {!! Form::checkbox('userHole[opcaoGerente]', 3, isset($rolePermission['roleGerente']) ? $rolePermission['roleGerente'] : null, ['id' => 'opcao3']) !!}
                    <i class="input-helper"></i>
                    GERENTE
                </label>
            </div>

            <label>Status:</label>
            <div class="form-group">
                <label for="status" class="checkbox checkbox-inline m-r-20">
                    {!! Form::hidden('active', 0) !!}
                    {!! Form::checkbox('active', 1, null, ['id' => 'status']) !!}
                    <i class="input-helper"></i>
                    Ativo
                </label>
            </div>
            </br>

            @if(!isset($model))
                <div class="form-group">
                    <div class="fg-line">
                        <label for="id_operadores">Operador</label>
                        <div class="select">
                            {!! Form::select('id_operadores', $selectOperador, null, array('class'=> 'form-control')) !!}
                        </div>
                    </div>
                </div>
            @endif
        @endif

        <button class="btn btn-primary btn-sm m-t-10">Salvar</button>

        @if(Auth::user()->is('ROLE_ADMIN') || Auth::user()->is('ROLE_GERENTE'))
            <a class="btn btn-primary btn-sm m-t-10" href="{{ route('usuario.index') }}">Voltar</a>
        @endif

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
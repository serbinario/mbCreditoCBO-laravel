{{--{{dd($model->userHole)}}--}}
<div class="col m6 s12">
    <div class="card-panel">
        <div class="row">
            <span class="blue-text text-darken-4"><h5>Cadastro de Usuário</h5></span>
            <div class="divider"></div>
            <div class="row">
                <div class="input-field col s12 m6 l2">
                    <label for="username">Login: </label>
                    {!! Form::text('username', Session::getOldInput('username'), array('placeholder' => 'Nome de usuário')) !!}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l2">
                    <label for="password">Senha: </label>
                    {!! Form::password('password', array('placeholder' => 'Senha')) !!}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l2">
                    <label for="email">E-mail: </label>
                    {!! Form::text('email', Session::getOldInput('email'), array('placeholder' => 'E-mail')) !!}

                </div>
            </div>
            <div class="row" >
                <label>Permissão:</label>
                </br>
                {!! Form::checkbox('userHole[opcaoOperador]', 1, isset($rolePermission['roleOperador']) ?? null, ['id' => 'opcao1']) !!}
                <label for="opcao1">OPERADOR</label>

                {!! Form::checkbox('userHole[opcaoAdmin]', 2, isset($rolePermission['roleAdmin']) ?? null, ['id' => 'opcao2']) !!}
                <label for="opcao2">ADMIN</label>

                {!! Form::checkbox('userHole[opcaoGerente]', 3, isset($rolePermission['roleGerente']) ?? null, ['id' => 'opcao3']) !!}
                <label for="opcao3">GERENTE</label>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l4">
                    {!! Form::select('id_operadores', ([$loadFields['operador']->toArray()]), null, array()) !!}
                    <label>Operador</label>
                 </div>
            </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l12">
                    <button class="btn">Salvar</button>
                    <a class="btn" href="http://ser.cbo/index.php/operador/index">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>
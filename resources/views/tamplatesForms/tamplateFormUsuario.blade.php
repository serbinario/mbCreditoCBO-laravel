{{--{{dd ($model) }}--}}
<div class="col m6 s12">
    <div class="card-panel">
        <div class="row">
            <div class="row">
                <div class="input-field col s12 m6 l2">
                    <label for="username">Login: </label>
                    {!! Form::text('usuario[username]', Session::getOldInput('usuario[username]'), array('placeholder' => 'Nome de usuário')) !!}

                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l2">
                    <label for="password">Senha: </label>
                    {!! Form::password('usuario[password]', array('placeholder' => 'Senha')) !!}

                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l2">
                    <label for="email">E-mail: </label>
                    {!! Form::text('usuario[email]', Session::getOldInput('usuario[email]'), array('placeholder' => 'E-mail')) !!}

                </div>
            </div>
            <div >
                {!! Form::checkbox('role[role_id]', 1, null, ['id' => 'opcao1']) !!}
                <label for="opcao1">OPERADOR</label>

                {!! Form::checkbox('role[role_id]', 2, null, ['id' => 'opcao2']) !!}
                <label for="opcao2">ADMIN</label>

                {!! Form::checkbox('role[role_id]', 3, null, ['id' => 'opcao3']) !!}
                <label for="opcao3">GERENTE</label>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l4">
                    <div class="input-field col s12">
                        {!! Form::select('usuario[id_operadores]', ([$loadFields['operador']->toArray()]), null, array()) !!}
                        <label>Materialize Multiple Select</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m6 l12">
                    <button class="btn">Salvar</button>
                    <a class="btn" href="http://ser.cbo/index.php/usuario/index">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>
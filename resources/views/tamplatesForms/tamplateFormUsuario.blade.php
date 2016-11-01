<div class="card">
    <div class="card-header">
    </div>

    <div class="card-body card-padding">
        <div class="form-group fg-line">
            <label for="username">Login: </label>
            {!! Form::text('username', Session::getOldInput('username'), array('class' => 'form-control input-sm', 'placeholder' => 'Nome de usuário')) !!}
        </div>

        <div class="form-group fg-line">
            <label for="password">Senha: </label>
            {!! Form::password('password', array('class' => 'form-control input-sm', 'placeholder' => 'Senha')) !!}
        </div>

        <div class="form-group fg-line">
            <label for="email">E-mail: </label>
            {!! Form::text('email', Session::getOldInput('email'), array('class' => 'form-control input-sm', 'placeholder' => 'E-mail')) !!}
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

        <div class="form-group fg-line">
            <label for="id_operadores">Operador</label>
            <div class="form-group">
                <div class="select">
                    {!! Form::select('id_operadores', ([$loadFields['operador']->toArray()]), null, array('class'=> 'form-control')) !!}
                </div>
            </div>
        </div>

        <button class="btn btn-primary btn-sm m-t-10">Salvar</button>
        <a class="btn btn-primary btn-sm m-t-10" href="http://ser.cbo/index.php/operador/index">Voltar</a>

    </div>
</div>
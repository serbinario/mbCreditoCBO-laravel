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

        <div class="checkbox m-b-15">
            <label>
                <input type="checkbox" value="">
                <i class="input-helper"></i>
                Option one is this and that-be sure to include why it's great
            </label>
        </div>


                <label>Permissão:</label>
                </br>

                <label for="opcao1">

                    {!! Form::checkbox('userHole[opcaoOperador]', 1, isset($rolePermission['roleOperador']) ?? null, ['class' => 'input-helper','id' => 'opcao1']) !!}
                    OPERADOR
                </label>




                {!! Form::checkbox('userHole[opcaoAdmin]', 2, isset($rolePermission['roleAdmin']) ?? null, ['id' => 'opcao2']) !!}
                <label for="opcao2">ADMIN</label>

                {!! Form::checkbox('userHole[opcaoGerente]', 3, isset($rolePermission['roleGerente']) ?? null, ['id' => 'opcao3']) !!}
                <label for="opcao3">GERENTE</label>


        <div class="form-group fg-line">
            <label for="id_operadores">Operador</label>
            <div class="form-group">
                <div class="select">
            {!! Form::select('id_operadores', ([$loadFields['operador']->toArray()]), null, array('class'=> 'form-control')) !!}
                </div>
            </div>
        </div>

        <button class="btn">Salvar</button>
        <a class="btn" href="http://ser.cbo/index.php/operador/index">Voltar</a>

    </div>
</div>
<div class="card">
    <div class="card-header">
    </div>

    <div class="card-body card-padding">
            <div class="form-group fg-line">
                <label for="numero_agencia">Número: </label>
                {!! Form::text('numero_agencia', Session::getOldInput('numero_agencia'), array('class' => 'form-control input-sm', 'placeholder' => 'Número da agência')) !!}
            </div>

            <div class="form-group fg-line">
                <label for="nome_agencia">Nome: </label>
                {!! Form::text('nome_agencia', Session::getOldInput('nome_agencia'), array('class' => 'form-control input-sm', 'placeholder' => 'Nome da agência')) !!}
            </div>

            <div class="input-field col s12 m6 l12">
                <button class="btn btn-primary btn-sm m-t-10">Salvar</button>
                <a class="btn btn-primary btn-sm m-t-10" href="http://ser.cbo/index.php/agencia/index">Voltar</a>
            </div>

    </div>
</div>
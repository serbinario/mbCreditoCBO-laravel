<div class="card">
    <div class="card-header">
    </div>

    <div class="card-body card-padding">
        <div class="form-group fg-line">
            <label for="nome_convenio">Nome:</label>
            {!! Form::text('nome_convenio', Session::getOldInput('nome_convenio'), array('class' => 'form-control input-sm', 'placeholder' => 'Nome do Convênio')) !!}
        </div>

        <button class="btn btn-primary btn-sm m-t-10">Salvar</button>
        <a class="btn btn-primary btn-sm m-t-10" href="http://ser.cbo/index.php/convenio/index">Voltar</a>
    </div>
</div>
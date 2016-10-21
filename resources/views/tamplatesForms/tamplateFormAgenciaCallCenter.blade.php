<div class="col m6 s12">
    <div class="row">
        <span class="blue-text text-darken-4"><h5>Cadastro de Agência</h5></span>
        <div class="divider"></div>
        <div class="row">
            <div class="input-field col s12 m6 l2">
                <label for="numero_agencia">Número: </label>
                {!! Form::text('numero_agencia', Session::getOldInput('numero_agencia'), array('placeholder' => 'Número da agência')) !!}
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6 l2">
                <label for="nome_agencia">Nome: </label>
                {!! Form::text('nome_agencia', Session::getOldInput('nome_agencia'), array('placeholder' => 'Nome da agência')) !!}
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6 l12">
                <button class="btn">Salvar</button>
                <button class="btn">Voltar</button>
            </div>
        </div>
    </div>
</div>
<div class="col m6 s12">
    <div class="card-panel">
        <div class="row">
            <span class="blue-text text-darken-4"><h5 >Cadastro de Convênios</h5></span>
            <div class="divider"></div>
            <div class="row">
                <div class="input-field col s12 m6 l2">
                    <label for="nome_convenio">Nome:</label>
                    {!! Form::text('nome_convenio', Session::getOldInput('nome_convenio'), array('placeholder' => 'Nome do Convênio')) !!}
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
</div>
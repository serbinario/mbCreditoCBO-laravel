<div class="card">
    <div class="card-header">
        <h4>Novo Agente</h4>
    </div>

    <div class="card-body card-padding">
        <form role="form">
            <div class="form-group fg-line">
                <label for="cod_operadores">Chave J</label>
                {!! Form::text('cod_operadores', Session::getOldInput('cod_operadores'), array('class' => 'form-control input-sm', 'placeholder' => 'Chave J')) !!}
            </div>
            <div class="form-group fg-line">
                <label for="nome_operadores">Nome</label>
                {!! Form::text('nome_operadores', Session::getOldInput('nome_operadores'), array('class' => 'form-control input-sm', 'placeholder' => 'Nome Completo')) !!}
            </div>

            <button type="submit" class="btn btn-primary btn-sm m-t-10">Salvar</button>
            <a class="btn btn-primary btn-sm m-t-10" href="http://ser.cbo/index.php/operador/index">Voltar</a>
        </form>
    </div>
</div>
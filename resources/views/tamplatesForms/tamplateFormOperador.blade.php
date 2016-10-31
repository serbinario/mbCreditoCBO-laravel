<div class="card">
    <div class="card-header">
    </div>

    <div class="card-body card-padding">
            <div class="form-group fg-line">
                <label for="exampleInputEmail1">Chave J</label>
                {!! Form::text('cod_operadores', Session::getOldInput('cod_operadores'), array('class' => 'form-control input-sm', 'placeholder' => 'Chave J')) !!}
            </div>
            <div class="form-group fg-line">
                <label for="exampleInputPassword1">Nome</label>
                {!! Form::text('nome_operadores', Session::getOldInput('nome_operadores'), array('class' => 'form-control input-sm', 'placeholder' => 'Nome Completo')) !!}
            </div>

            <button type="submit" class="btn btn-primary btn-sm m-t-10">Submit</button>
            <a class="btn btn-primary btn-sm m-t-10" href="http://ser.cbo/index.php/operador/index">Voltar</a>

    </div>
</div>

{{--
<div class="card">
    <div class="card-header">
    </div>

    <div class="card-body card-padding">
        <form role="form">
            <div class="form-group fg-line">
                <label for="cod_operadores">Chave J: </label>
                {!! Form::text('cod_operadores', Session::getOldInput('cod_operadores'), array('class' => 'form-control input-sm', 'placeholder' => 'Chave J')) !!}
            </div>
            <div class="form-group fg-line">
                <div class="col-sm-4">
                    <label for="nome_operadores">Nome: </label>
                    {!! Form::text('nome_operadores', Session::getOldInput('nome_operadores'), array('class' => 'form-control input-sm', 'placeholder' => 'Nome Completo')) !!}
                </div>
            </div>

            <button class="btn">Salvar</button>
            <a class="btn" href="http://ser.cbo/index.php/operador/index">Voltar</a>
        </form>
    </div>
</div>--}}

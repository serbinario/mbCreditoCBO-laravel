<div class="card">
    <div class="card-header">
    </div>

    <div class="card-body card-padding">
        <div class="form-group fg-line">
            <label for="cliente[name]">Nome </label>
            {!! Form::text('cliente[name]', Session::getOldInput('cliente[name]'), array('class' => 'form-control input-sm', 'placeholder' => 'Nome completo')) !!}
        </div>

        <div class="form-group fg-line">
            <label for="cliente[cpf]">CPF</label>
            {!! Form::text('cliente[cpf]', Session::getOldInput('clientes[cpf]'), array('class' => 'form-control input-sm', 'placeholder' => 'CPF do cliente')) !!}
        </div>

        <div class="form-group fg-line">
            <label for="cliente[telefone]">Telefone Fixo</label>
            @if(isset($model))
                {!! Form::text('cliente[telefone]', $model->cliente->telefone->last()->telefone??"", array('class' => 'form-control input-sm', 'placeholder' => 'Nº telefone')) !!}
            @else
                {!! Form::text('cliente[telefone]', Session::getOldInput('cliente[telefone]'), array('class' => 'form-control input-sm', 'placeholder' => 'Nº telefone')) !!}
            @endif
        </div>

        <div class="fg-line">
            <label for="cliente[agencia_id]">Agência</label>
            <div class="form-group">
                <div class="select">
                   {!! Form::select('cliente[agencia_id]', ([$loadFields['agenciacallcenter']->toArray()]), null, array('class'=> 'form-control')) !!}
                </div>
            </div>
        </div>

        <div class="form-group fg-line">
            <label for="cliente[conta]">Conta</label>
            {!! Form::text('cliente[conta]', Session::getOldInput('cliente[conta]'), array('class' => 'form-control input-sm', 'placeholder' => 'Conta do cliente')) !!}
        </div>

        <div class="fg-line">
            <label for="cliente[agencia_id]">Convêmio</label>
            <div class="form-group">
                <div class="select">
                    {!! Form::select('convenio_id', ([$loadFields['conveniocallcenter']->toArray()]), null, array('class'=> 'form-control')) !!}
                </div>
            </div>
        </div>

        <div class="fg-line">
            <label for="cliente[agencia_id]">Tipos de Créditos</label>
            <div class="form-group">
                <div class="select">
                {!! Form::select('tipo_contrato_id', ([$loadFields['tipocontrato']->toArray()]), null, array('class'=> 'form-control')) !!}
                </div>
            </div>
        </div>

        <div class="form-group fg-line">
            <label for="data_contratado">Data da Contratação</label>
            {!! Form::text('data_contratado', Session::getOldInput('data_contratado'), array('class' => 'form-control input-sm', 'placeholder' => 'Data da contratação')) !!}
        </div>

        <div class="form-group fg-line">
            <label for="valor_contratado">Valor Contratado</label>
            {!! Form::text('valor_contratado', Session::getOldInput('valor_contratado'), array('class' => 'form-control input-sm', 'placeholder' => 'Valor do Contrato')) !!}
        </div>
        <div class="form-group fg-line">
            <label for="codigo_transacao">Nº do Contrato</label>
            {!! Form::text('codigo_transacao', Session::getOldInput('codigo_transacao'), array('class' => 'form-control input-sm', 'placeholder' => 'Número do Contrato')) !!}
        </div>

        <div class="form-group fg-line">
            <label for="cliente[agencia_id]">Quantidade de Parcelas</label>
            <div class="form-group">
                <div class="select">
                {!! Form::select('prazo', ([$loadFields['contrato']->toArray()]), null, array('class'=> 'form-control')) !!}
                </div>
            </div>
        </div>

        <div class="form-group fg-line">
            <label for="data_prox_chamada">Data próx. Ligação</label>
            {!! Form::text('data_prox_chamada', Session::getOldInput('data_prox_chamada'), array('class' => 'form-control input-sm', 'placeholder' => 'Data')) !!}
        </div>

            <!--botão-->
                    <button class="btn btn-primary btn-sm m-t-10">Salvar</button>
                    <a class="btn btn-primary btn-sm m-t-10" href="http://ser.cbo/index.php/contrato/index">Voltar</a>
            <!--botão-->
    </div>
</div>
{{--{{ dd($model) }}--}}
<div class="col m6 s12">
    <div class="card-panel">
        <div class="row">
            <div class="row">
                <div class="input-field col s12 m6 l5">
                    {!! Form::text('cliente[name]', Session::getOldInput('cliente[name]'), array('placeholder' => 'Nome completo')) !!}
                    <label for="cliente[name]">Nome: </label>
                </div>
                <div class="input-field col s12 m6 l3">
                    {!! Form::text('cliente[cpf]', Session::getOldInput('clientes[cpf]'), array('placeholder' => 'CPF do cliente')) !!}
                    <label for="cliente[cpf]">CPF</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l2">
                    @if(isset($model))
                    {!! Form::text('cliente[telefone]', $model->cliente->telefone->last()->telefone??"", array('placeholder' => 'Nº telefone')) !!}
                        @else
                        {!! Form::text('cliente[telefone]', Session::getOldInput('cliente[telefone]'), array('placeholder' => 'Nº telefone')) !!}
                    @endif
                    <label for="cliente[telefone]">Telefone Fixo</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l2">
                    {!! Form::select('cliente[agencia_id]', ([$loadFields['agenciacallcenter']->toArray()]), null, array()) !!}
                    <label for="cliente[agencia_id]">Agência</label>
                </div>
                <div class="input-field col s12 m6 l2">
                    {!! Form::text('cliente[conta]', Session::getOldInput('cliente[conta]'), array('placeholder' => 'Conta do cliente')) !!}
                    <label for="cliente[conta]">Conta</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l2">
                    {!! Form::select('convenio_id', ([$loadFields['conveniocallcenter']->toArray()]), null, array()) !!}
                    <label>Convênio</label>
                </div>
                <div class="input-field col s12 m6 l2">
                    {!! Form::select('tipo_contrato_id', ([$loadFields['tipocontrato']->toArray()]), null, array()) !!}
                    <label>Tipos de Créditos</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l2">
                    {!! Form::text('data_contratado', Session::getOldInput('data_contratado'), array('placeholder' => 'Data da contratação')) !!}
                    <label for="data_contratado">Data da Contratação</label>
                </div>
                <div class="input-field col s12 m6 l2">
                    {!! Form::text('valor_contratado', Session::getOldInput('valor_contratado'), array('placeholder' => 'Valor do Contrato')) !!}
                    <label for="valor_contratado">Valor Contratado</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l2">
                    {!! Form::text('codigo_transacao', Session::getOldInput('codigo_transacao'), array('placeholder' => 'Número do Contrato')) !!}
                    <label for="codigo_transacao">Nº do Contrato</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l2">
                    {!! Form::select('prazo', ([$loadFields['contrato']->toArray()]), null, array()) !!}
                    <label for="prazo">Quantidade de Parcelas</label>
                </div>
                <div class="input-field col s12 m6 l2">
                    {!! Form::text('data_prox_chamada', Session::getOldInput('data_prox_chamada'), array('placeholder' => 'Data')) !!}
                    <label for="data_prox_chamada">Data próx. Ligação</label>
                </div>
            </div>
        </div>
            <!--botão-->
            <div class="row">
                <div class="input-field col s12 m6 l12">
                    <button class="btn">Salvar</button>
                    <a class="btn" href="http://ser.cbo/index.php/contrato/index">Voltar</a>
                </div>
            </div>
            <!--botão-->
        </div>
    </div>
</div>
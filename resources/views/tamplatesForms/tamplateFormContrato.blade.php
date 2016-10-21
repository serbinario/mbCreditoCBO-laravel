{{--{{dd ($model) }}--}}
<div class="col m6 s12">
    <div class="card-panel">
        <div class="row">
            <div class="row">
                <div class="input-field col s12 m6 l2">
                    <label for="clientes[name]">Nome: </label>
                    {!! Form::text('clientes[name]', Session::getOldInput('clientes[name]'), array('placeholder' => 'Nome completo')) !!}

                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l2">
                    <label for="clientes[cpf]">CPF</label>
                    {!! Form::text('clientes[cpf]', Session::getOldInput('clientes[cpf]'), array('placeholder' => 'CPF do cliente')) !!}

                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l2">
                    <label for="agencia_id">Agência</label>
                    {!! Form::select('agencia_id', array(), null, array()) !!}

                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l2">
                    <label for="clientes[conta]">Conta</label>
                    {!! Form::text('clientes[conta]', Session::getOldInput('clientes[conta]'), array('placeholder' => 'Conta do cliente')) !!}

                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l2">
                    <label for="chamadas[data_contratado]">Data da Contratação</label>
                    {!! Form::text('chamadas[data_contratado]', Session::getOldInput('chamadas[data_contratado]'), array('placeholder' => 'Data da contratação')) !!}

                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l2">
                    <label for="max_odccwupancy">Convênio</label>
                    {!! Form::select('convenio_id', array(), null, array()) !!}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l2">
                    <label for="chamadas[condigo_transacao]">Data da Contratação</label>
                    {!! Form::text('chamadas[condigo_transacao]', Session::getOldInput('chamadas[condigo_transacao]'), array('placeholder' => 'Nº do contrato')) !!}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l2">
                    <label for="chamadas[valor_contratado]">Valor Contratado: </label>
                    {!! Form::text('chamadas[valor_contratado]', Session::getOldInput('chamadas[valor_contratado]'), array('placeholder' => 'Valor do Contrato')) !!}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l2">
                    <label for="chamadas[prazo]">Quantidade de Parcelas</label>
                    {!! Form::select('chamadas[prazo]', array(), null, array()) !!}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l2">
                    <label for="chamadas[data_prox_chamada]">Data da Contratação</label>
                    {!! Form::text('chamadas[data_prox_chamada]', Session::getOldInput('chamadas[data_prox_chamada]'), array('placeholder' => 'Data próx. Ligação')) !!}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l12">
                    <button class="btn" ng-click="create()">Salvar</button>
                    <button class="btn" ng-click="create()">Voltar</button>
                </div>
            </div>
        </div>
    </div>
</div>
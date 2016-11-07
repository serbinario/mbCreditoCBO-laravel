<div class="card">
    <div class="card-header">
    </div>

    <div class="card-body card-padding">

        <div class="form-group">
            <div class="fg-line">
                <label for="searchCpf">Consultar CPF</label>
                {!! Form::text('searchCpf', Session::getOldInput('searchCpf'), array('id' => 'searchCliente', 'class' => 'form-control input-sm', 'placeholder' => 'Número de CPF')) !!}
            </div>
        </div>

        <button type="button" id="btnConsultar">Consultar</button>
        </br>
        {{--<hr>--}}

        <div class="form-group">
            <div class=" fg-line">
                <label for="cliente[name]">Nome </label>
                {!! Form::text('cliente[name]', Session::getOldInput('cliente[name]'), array('id' => 'clienteNome', 'class' => 'form-control input-sm', 'placeholder' => 'Nome completo do cliente')) !!}
            </div>
        </div>

        <div class="form-group">
            <div class=" fg-line">
                <label for="cliente[cpf]">CPF</label>
                {!! Form::text('cliente[cpf]', Session::getOldInput('clientes[cpf]'), array('id' => 'clienteCpf', 'class' => 'form-control input-sm', 'placeholder' => 'CPF do cliente')) !!}
            </div>
        </div>

        <div class="form-group">
            <div class=" fg-line">
                <label for="numero">Telefone Fixo</label>
                @if(isset($model))
                    {!! Form::text('telefone[numero]', $model->cliente->telefone->last()->telefone??"", array('id' => 'clienteTelefone', 'class' => 'form-control input-sm', 'placeholder' => 'Nº telefone')) !!}
                @else
                    {!! Form::text('telefone[numero]', Session::getOldInput('telefone[numero]'), array('id' => 'clienteTelefone', 'class' => 'form-control input-sm', 'placeholder' => 'Nº telefone')) !!}
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="fg-line">
                <label for="cliente[agencia_id]">Agência</label>
                <div class="select">
                   {!! Form::select('cliente[agencia_id]', ([$loadFields['agenciacallcenter']->toArray()]), null, array('class'=> 'form-control')) !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="fg-line">
                <label for="cliente[conta]">Conta</label>
                {!! Form::text('cliente[conta]', Session::getOldInput('cliente[conta]'), array('id' => 'clienteConta', 'class' => 'form-control input-sm', 'placeholder' => 'Conta do cliente')) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="fg-line">
                <label for="convenio_id">Convêmio</label>
                <div class="select">
                    {!! Form::select('convenio_id', ([$loadFields['conveniocallcenter']->toArray()]), null, array('class'=> 'form-control')) !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="fg-line">
                <label for="tipo_contrato_id">Tipos de Créditos</label>
                <div class="select">
                {!! Form::select('tipo_contrato_id', ([$loadFields['tipocontrato']->toArray()]), null, array('class'=> 'form-control')) !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="fg-line">
                <label for="data_contratado">Data da Contratação</label>
                {!! Form::text('data_contratado', Session::getOldInput('data_contratado'), array('class' => 'form-control input-sm', 'placeholder' => 'Data da contratação')) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="fg-line">
                <label for="valor_contratado">Valor Contratado</label>
                {!! Form::text('valor_contratado', Session::getOldInput('valor_contratado'), array('class' => 'form-control input-sm', 'placeholder' => 'Valor do Contrato')) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="fg-line">
                <label for="codigo_transacao">Nº do Contrato</label>
                {!! Form::text('codigo_transacao', Session::getOldInput('codigo_transacao'), array('class' => 'form-control input-sm', 'placeholder' => 'Número do Contrato')) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="fg-line">
                <label for="matricula">Matrícula</label>
                {!! Form::text('matricula', Session::getOldInput('matricula'), array('class' => 'form-control input-sm', 'placeholder' => 'Número do Contrato')) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="fg-line">
                <label for="prazo">Quantidade de Parcelas</label>
                <div class="form-group">
                    <div class="select">
                    {!! Form::select('prazo', ([$loadFields['contrato']->toArray()]), null, array('class'=> 'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="fg-line">
                <label for="data_prox_chamada">Data próx. Ligação</label>
                {!! Form::text('data_prox_chamada', Session::getOldInput('data_prox_chamada'), array('class' => 'form-control input-sm', 'placeholder' => 'Data')) !!}
            </div>
        </div>

            <!--botão-->
            <button class="btn btn-primary btn-sm m-t-10">Salvar</button>
            <a class="btn btn-primary btn-sm m-t-10" href="http://ser.cbo/index.php/contrato/index">Voltar</a>
            <!--botão-->
    </div>
</div>

@section('javascript')
    {{--Mensagens personalizadas--}}
    <script type="text/javascript" src="{{ asset('/dist/js/messages_pt_BR.js')  }}"></script>
    {{--Regras adicionais--}}
    <script type="text/javascript" src="{{ asset('/lib/jquery-validation/src/additional/alphanumeric.js')  }}"></script>
    <script type="text/javascript" src="{{ asset('/dist/js/adicional/alphaSpace.js')  }}"></script>
    <script type="text/javascript" src="{{ asset('/lib/jquery-validation/src/additional/integer.js')  }}"></script>
    {{--Regras de validação--}}
    <script type="text/javascript" src="{{ asset('/dist/js/validacao/contrato.js')  }}"></script>

    <script type="text/javascript">

        $(document).on('click', "#btnConsultar", function () {
        //Recuperando CPF inserido
        var cpfCliente = $('#searchCliente').val();

            //Checando se o campo de consulta foi preenchido
            if (cpfCliente == "") {
                alert("Por favor, informe um número válido");
            } else {

                //Buscando dados cliente pelo CPF
                jQuery.ajax({
                    type: 'GET',
                    url: 'http://ser.cbo/index.php/contrato/searchCliente/' + cpfCliente,
                    datatype: 'json'
                }).done(function (json) {
                    console.log(json.dados.length);

                    if (json.dados.length > 0) {
                        //Injetando dados nos campos
                        $('#clienteNome').val(json.dados[0]['name']);
                        $('#clienteCpf').val(json.dados[0]['cpf']);
                        $('#clienteConta').val(json.dados[0]['conta']);
                        $('#clienteTelefone').val(json.dados[0]['numero']);

                        //Desabilitando os input
                        $('#clienteNome').prop('disabled', true);
                        $('#clienteCpf').prop('disabled', true);
                        $('#clienteConta').prop('disabled', true);
                        $('#clienteTelefone').prop('disabled', true);

                    } else {
                        //Apagando dados do input
                        $('#clienteNome').val("");
                        $('#clienteCpf').val("");
                        $('#clienteConta').val("");
                        $('#clienteTelefone').val("");
                    }
                })
            }
        });

    </script>

@endsection
<style>
    .topo-conteudo-full {
        border-bottom: 1px solid #c3ced2;
        color: #136d9c;
        display: block;
        margin-bottom: 10px;
        text-transform: uppercase;
    }
</style>

<div class="block-header">
    <h2>Cadastro de Contratos</h2>

</div>

<div class="card">
    <div class="card-body card-padding">
        @if(!isset($model))
            <div class="topo-conteudo-full">
                <h4>Consultar cliente por CPF:</h4>
            </div>

            <div class="row">
                <div class="form-group col-sm-4">
                    <div class=" fg-line">
                        <label for="searchCpf"></label>
                        {!! Form::text('searchCpf', Session::getOldInput('searchCpf'), array('id' => 'searchCliente', 'class' => 'form-control input-sm', 'placeholder' => 'Número de CPF')) !!}
                    </div>
                </div>
                <div class="col-sm-4 m-t-15">
                    <a class="btn btn-primary btn-sm m-t-10" id="btnConsultar" href="#">Consultar</a>
                </div>
            </div>
        @endif

        <div class="topo-conteudo-full">
            <h4>Dados do cliente</h4>
        </div>

        <div class="row">
            <div class="form-group col-sm-8">
                <div class=" fg-line">
                    <label for="cliente[name]">Nome </label>
                    {!! Form::text('cliente[name]', Session::getOldInput('cliente[name]'), array('id' => 'clienteNome', 'class' => 'form-control input-sm', 'placeholder' => 'Nome completo do cliente')) !!}
                    </div>
                </div>
            <div class="form-group col-sm-4">
                <div class="fg-line">
                    <label for="cliente[cpf]">CPF</label>
                    {!! Form::text('cliente[cpf]', Session::getOldInput('clientes[cpf]'), array('id' => 'clienteCpf', 'class' => 'form-control input-sm', 'placeholder' => 'CPF do cliente')) !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-4">
                <div class="fg-line">
                    <label for="cliente[agencia_id]">Agência</label>
                    <div class="select">
                        {!! Form::select('cliente[agencia_id]', ([["" => "Selecione uma agência"] + $loadFields['agenciacallcenter']->toArray()]), null, array('id' => 'clienteAgencia')) !!} {{--, 'class'=> 'chosen'--}}
                    </div>
                </div>
            </div>

            <div class="form-group col-sm-4">
                <div class=" fg-line">
                    <label for="cliente[conta]">Conta</label>
                        {!! Form::text('cliente[conta]', Session::getOldInput('cliente[conta]'), array('id' => 'clienteConta', 'class' => 'form-control input-sm', 'placeholder' => 'Conta do cliente')) !!}
                </div>
            </div>
        </div>

        <div class="topo-conteudo-full">
            <h4>Telefones</h4>
        </div>

        <div class="row">
            <div class="table-responsive">
                <div class="form-group col-sm-2">
                    <input type="text" id="addPhoneText" class="form-control input-sm" placeholder='Nº telefone'>
                    {{--{!! Form::text('telefone', null, array('id' => 'addPhoneText', 'class' => 'form-control input-sm', 'placeholder' => 'Nº telefone')) !!}--}}
                </div>

                <div class="form-group col-sm-2">
                    <a class="btn btn-primary btn-sm m-t-10" id="addPhone" onclick="objTablePhone.newFone(this)">Adicionar</a>

                </div>


                <table id="telefones-grid" class="table table-hover">
                    <thead>
                    <tr>
                        <th>Telefone</th>
                        <th style="width: 10%">Ação</th>
                    </tr>
                    </thead>
                </table>
            </div>

            <input type="hidden" name="telefones" id="telefones">
            {{--<div class="form-group">--}}
                {{--<div class=" fg-line">--}}
                    {{--<label for="numero">Telefone Fixo</label>--}}
                    {{--@if(isset($model))--}}
                        {{--{!! Form::text('telefone[numero]', $model->cliente->telefone->last()->telefone??"", array('id' => 'clienteTelefone', 'class' => 'form-control input-sm', 'placeholder' => 'Nº telefone')) !!}--}}
                    {{--@else--}}
                        {{--{!! Form::text('telefone[numero]', Session::getOldInput('telefone[numero]'), array('id' => 'clienteTelefone', 'class' => 'form-control input-sm', 'placeholder' => 'Nº telefone')) !!}--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>

        <div class="topo-conteudo-full">
            <h4>Dados do Contrato</h4>
        </div>

        <div class="row">
            <div class="form-group col-sm-4">
                <div class=" fg-line">
                    <label for="convenio_id">Convêmio</label>
                    <div class="select">
                        {!! Form::select('convenio_id', ([["" => "Selecione um convênio"] + $loadFields['conveniocallcenter']->toArray()]), null, array('class'=> 'chosen')) !!}
                    </div>
                </div>
            </div>
            <div class="form-group col-sm-4">
                <div class="fg-line">
                    <label for="tipo_contrato_id">Tipos de Créditos</label>
                    <div class="select">
                        {!! Form::select('tipo_contrato_id', ([["" => "Linha de crédito"] + $loadFields['tipocontrato']->toArray()]), null, array('class'=> 'chosen')) !!}
                    </div>
                </div>
            </div>
            <div class="form-group col-sm-4">
                <div class="fg-line">
                    <div class="fg-line">
                        <label for="data_contratado">Data da Contratação</label>
                        {!! Form::text('data_contratado', Session::getOldInput('data_contratado'), array('class' => 'datepicker form-control input-sm', 'placeholder' => 'Data da contratação')) !!}
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="form-group col-sm-3">
                <div class=" fg-line">
                    <label for="valor_contratado">Valor Contratado</label>
                    {!! Form::text('valor_contratado', Session::getOldInput('valor_contratado'), array('class' => 'form-control input-sm', 'placeholder' => 'Valor do Contrato')) !!}
                </div>
            </div>
            <div class="form-group col-sm-3">
                <div class="fg-line">
                    <label for="codigo_transacao">Nº do Contrato</label>
                    {!! Form::text('codigo_transacao', Session::getOldInput('codigo_transacao'), array('id' => 'condigoTransacao', 'class' => 'form-control input-sm', 'placeholder' => 'Número do Contrato')) !!}
                </div>
            </div>
            <div class="form-group col-sm-3">
                <div class="fg-line">
                    <label for="matricula">Matrícula</label>
                    {!! Form::text('matricula', Session::getOldInput('matricula'), array('class' => 'form-control input-sm', 'placeholder' => 'Número do Contrato')) !!}
                </div>
            </div>

            <div class="form-group col-sm-3">
                <div class="fg-line">
                    <label for="prazo">Quantidade de Parcelas</label>
                    <div class="select">
                        {!! Form::select('prazo', ([["" => "Número de parcelas"] + $loadFields['contrato']->toArray()]), null, array('class'=> 'chosen')) !!}
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
        <a class="btn btn-primary btn-sm m-t-10" href="{{ route('contrato.index') }}">Voltar</a>
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
    {{--<script type="text/javascript" src="{{ asset('/dist/js/validacao/contrato.js')  }}"></script>--}}

    {{--GERENCIAMENTO TELEFONES--}}
    <script type="text/javascript" src="{{ asset('/dist/js/contrato/gerenciamento_telefones.js')  }}"></script>
    <script type="text/javascript">
        // Habilitando o ambiemte (Grid de Telefones) para create ou edit
        @if(isset($model))
        // Instaciando a table de telefones (Variável declarada no arquivo "gerenciemento_telefones.js")
        objTablePhone = new TablePhonesEdit("{{$model->cliente->id}}");
        @else
        // Instaciando a table de telefones (Variável declarada no arquivo "gerenciemento_telefones.js")
        objTablePhone = new TablePhonesCreate();
        @endif

        /*
         Evento responsável por consulta o cpf no banco de dados
         e preencher os dados do cliente se o cpf for encontrado.
         */
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
                    url: '/index.php/contrato/searchCliente/' + cpfCliente,
                    datatype: 'json'
                }).done(function (json) {
                    //Verificando se existe registro com CPF informado
                    if (json.dados.length > 0) {
                        //Injetando dados nos campos
                        $('#clienteNome').val(json.dados[0]['name']);
                        $('#clienteCpf').val(json.dados[0]['cpf']);
                        $('#clienteConta').val(json.dados[0]['conta']);
                        $('#clienteTelefone').val(json.dados[0]['numero']);

                        /*$('#clienteAgencia option').attr('selected', false);*/
                        $('#clienteAgencia option[value=' + json.dados[0]['id'] + ']').attr('selected', true);
//                        $('#clienteAgencia').chosen().select(11);

                        //Desabilitando os input
                        $('#clienteNome').attr('readonly', true);
                        $('#clienteCpf').attr('readonly', true);
                        $('#clienteConta').attr('readonly', true);
                        $('#clienteTelefone').attr('readonly', true);
                        $('#clienteAgencia').attr('readonly', true);

                        // Instaciando a table de telefones (Variável declarada no arquivo "gerenciemento_telefones.js")
                        objTablePhone.tableDestroy();
                        objTablePhone = new TablePhonesEdit(json.dados[0]['idCliente']);
                    } else {
                        //Apagando dados do input
                        $('#clienteNome').val("");
                        $('#clienteCpf').val("");
                        $('#clienteConta').val("");
                        $('#clienteTelefone').val("");
                        $('#clienteAgencia').val("");

                        // Instaciando a table de telefones (Variável declarada no arquivo "gerenciemento_telefones.js")
                        objTablePhone.tableDestroy();
                        objTablePhone = new TablePhonesCreate();
                    }
                })
            }
        });

        //Verificando se o número de contrato que foi preenchido já existe no banco
        /*$(document).on('focusout', "#condigoTransacao", function () {
            //Recuperando valor preenchido no campo
            var numeroContrato = $('#condigoTransacao').val();

            jQuery.ajax({
                type: 'GET',
                url: 'http://ser.cbo/index.php/contrato/searchContrato/' + numeroContrato,
                datatype: 'json'
            }).done(function (json) {

                if(json.dados.length > 0){
                    alert("O número de contrato preenchido já existe");
                }
            })
        });*/

    </script>

@endsection
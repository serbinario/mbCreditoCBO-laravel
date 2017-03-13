<div class="block-header">
    <h2>Cadastro de Contratos</h2>
</div>

<div class="card">
    <div class="card-body card-padding">

        <input type="hidden" id="idCliente" value="{{ isset($model->id) ? $model->id : null }}">

        @if(!isset($model))
            <div class="topo-conteudo-full">
                <h4>Consultar cliente por CPF:</h4>
            </div>

            <div class="row">
                <div class="form-group col-sm-4">
                    <div class=" fg-line">
                        <label for="searchCpf"></label>
                        {!! Form::text('searchCpf', Session::getOldInput('searchCpf'),
                            /*Se a página for carregada com dados do banco, searcCpf ficará oculto*/
                            array(isset($model) ? 'readonly' : '' ,'id' => 'searchCliente', 'class' => 'form-control input-sm', 'placeholder' => 'Número de CPF')) !!}
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
                    <label for="name">Nome </label>
                    {!! Form::text('name', Session::getOldInput('name'),
                        array(isset($model) ? 'readonly' : '', 'id' => 'clienteNome', 'class' => 'form-control input-sm', 'placeholder' => 'Nome completo do cliente')) !!}
                    </div>
                </div>
            <div class="form-group col-sm-4">
                <div class="fg-line">
                    <label for="cpf">CPF</label>
                    {!! Form::text('cpf', Session::getOldInput('cpf'),
                        array(isset($model) ? 'readonly' : '', 'id' => 'clienteCpf', 'class' => 'form-control input-sm', 'placeholder' => 'CPF do cliente')) !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-3">
                <div class="fg-line">
                    <label for="agencia_id">Agência</label>
                    <div class="select">
                        @if(!isset($model))
                            {!! Form::select('agencia_id', $selectAgencia, null, array('id' => 'clienteAgencia', 'class' => 'form-control')) !!}
                        @else
                            {!! Form::select('agencia_id', $selectAgencia, null, array('id' => 'clienteAgencia', 'class' => 'form-control', 'readonly' => 'true')) !!}
                        @endif
                    </div>
                </div>
            </div>
            {{--<div class="form-group col-sm-2">
                <div class="fg-line">
                    <div class="fg-line">
                        <label for="noAgencia">No. Agência</label>
                        {!! Form::text('noAgencia', Session::getOldInput('noAgencia'), array('id' => 'noAgencia', 'class' => 'form-control input-sm', 'readonly' => 'true')) !!}
                    </div>
                </div>
            </div>--}}
            <div class="form-group col-sm-4">
                <div class=" fg-line">
                    <label for="conta">Conta</label>
                        {!! Form::text('conta', Session::getOldInput('conta'),
                            array(isset($model) ? 'readonly' : '', 'id' => 'clienteConta', 'class' => 'form-control input-sm', 'placeholder' => 'Conta do cliente')) !!}
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
                    <label for="contrato[convenio_id]">Convênio</label>
                    <div class="select">
                        {!! Form::select('contrato[convenio_id]', ([["" => "Selecione um convênio"] + $loadFields['conveniocallcenter']->toArray()]), null, array('class'=> 'chosen')) !!}
                    </div>
                </div>
            </div>
            <div class="form-group col-sm-4">
                <div class="fg-line">
                    <label for="contrato[tipo_contrato_id]">Tipos de Créditos</label>
                    <div class="select">
                        {!! Form::select('contrato[tipo_contrato_id]', (["" => "Linha de crédito"] + $loadFields['tipocontrato']->toArray()), null, array('class'=> 'chosen')) !!}
                    </div>
                </div>
            </div>
            <div class="form-group col-sm-4">
                <div class="fg-line">
                    <div class="fg-line">
                        <label for="contrato[data_contratado]">Data da Contratação</label>
                        {!! Form::text('contrato[data_contratado]', Session::getOldInput('contrato[data_contratado]'), array('class' => 'form-control dateTimePicker input-sm', 'placeholder' => 'Data da contratação')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-3">
                <div class=" fg-line">
                    <label for="contrato[valor_contratado]">Valor Contratado</label>
                    {!! Form::text('contrato[valor_contratado]', Session::getOldInput('contrato[valor_contratado]'), array('id' => 'valorContrato', 'class' => 'form-control input-sm', 'placeholder' => 'Valor do Contrato')) !!}
                </div>
            </div>
            <div class="form-group col-sm-3">
                <div class="fg-line">
                    <label for="contrato[codigo_transacao]">Nº do Contrato</label>
                    {!! Form::text('contrato[codigo_transacao]', Session::getOldInput('contrato[codigo_transacao]'), array('id' => 'condigoTransacao', 'class' => 'form-control input-sm', 'placeholder' => 'Número do Contrato')) !!}
                </div>
            </div>
            <div class="form-group col-sm-3">
                <div class="fg-line">
                    <label for="contrato[matricula]">Matrícula/Benefício</label>
                    {!! Form::text('contrato[matricula]', Session::getOldInput('contrato[matricula]'), array('class' => 'form-control input-sm', 'placeholder' => 'Número de Matrícula')) !!}
                </div>
            </div>

            <div class="form-group col-sm-3">
                <div class="fg-line">
                    <label for="contrato[prazo]">Quantidade de Parcelas</label>
                    <div class="select">
                        {!! Form::select('contrato[prazo]', $arrayParcelas, null, array('id' => 'prazo', 'class'=> 'chosen')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-3">
                <div class="fg-line">
                    <label for="contrato[data_prox_chamada]">Data próx. Ligação</label>
                    {!! Form::text('contrato[data_prox_chamada]', Session::getOldInput('contrato[data_prox_chamada]'), array('id' => 'dataReligacao', 'class' => 'form-control dateTimePicker input-sm', 'placeholder' => 'Data')) !!}
                </div>
            </div>
        </div>

        <div class="topo-conteudo-full">
            <h4>Upload de Arquivos</h4>
        </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <span class="btn btn-primary btn-file m-r-10">
                            <span class="fileinput-new">Selecione um arquivo</span>
                            {{--<span class="fileinput-exists">Mudar</span>--}}
                            <input type="file" name="contrato[path_arquivo]">
                        </span>
                        <span class="fileinput-filename"></span>
                        <a href="#" class="close fileinput-exists" data-dismiss="fileinput">&times;</a>
                    </div>
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
    <script type="text/javascript" src="{{ asset('/dist/js/adicional/bankBr.js')  }}"></script>
    <script type="text/javascript" src="{{ asset('/dist/js/adicional/unique.js')  }}"></script>
    <script type="text/javascript" src="{{ asset('/dist/js/adicional/decimal.js')  }}"></script>
    <script type="text/javascript" src="{{ asset('/lib/jquery-validation/src/additional/integer.js')  }}"></script>
    <script type="text/javascript" src="{{ asset('/lib/jquery-validation/src/additional/cpfBR.js')  }}"></script>
    {{--Regras de validação--}}
    <script type="text/javascript" src="{{ asset('/dist/js/validacao/contrato.js')  }}"></script>

    {{--GERENCIAMENTO TELEFONES--}}
    <script type="text/javascript" src="{{ asset('/dist/js/contrato/gerenciamento_telefones.js')  }}"></script>
    <script type="text/javascript">

        //Responsavel por validar se a data de contratação inserida é superior a data atual
        $('#dataReligacao').focusout(function() {

            //variaveis de uso
            var dataReligacao = $('#dataReligacao').val();
            var arrayDataReligacao = dataReligacao.split("/");
            var dataAtual = new Date();

            if (arrayDataReligacao.length != 3) {
                return false;
            }

            var objDataReligacao = new Date(arrayDataReligacao[2], arrayDataReligacao[1]-1, arrayDataReligacao[0]);

            //se a data for inferior, informo e removo a data inserida
            if (objDataReligacao < dataAtual) {
                alert("A data para religação deve ser maior que a data atual");
                dataReligacao = $('#dataReligacao').val("");
            }
        });

        // Habilitando o ambiemte (Grid de Telefones) para create ou edit
        @if(isset($model))
        // Instaciando a table de telefones (Variável declarada no arquivo "gerenciemento_telefones.js")
        objTablePhone = new TablePhonesEdit("{{$model->id}}");
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
                //Variavel de uso
                $body = $('body');

                //Buscando dados cliente pelo CPF
                jQuery.ajax({
                    type: 'GET',
                    url: ['/contrato/searchCliente/' + cpfCliente],
                    datatype: 'json',
                    beforeSend: function () {
                        $body.addClass("loading");
                    },
                    complete: function () {
                        $body.removeClass("loading");
                    }
                }).done(function (json) {
                    //Verificando se existe registro com CPF informado
                    if (json.dados.length > 0) {
                        //Injetando dados nos campos
                        $('#clienteNome').val(json.dados[0]['name']);
                        $('#clienteCpf').val(json.dados[0]['cpf']);
                        $('#clienteConta').val(json.dados[0]['conta']);
                        $('#clienteTelefone').val(json.dados[0]['numero']);
                        $('#idCliente').val(json.dados[0]['idCliente']);
                        $('#noAgencia').val(json.dados[0]['numero_agencia']);

                        //Preenchendo o select de agência
                        $('#clienteAgencia option[value=' + json.dados[0]['id'] + ']').attr('selected', true);

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
                        $('#noAgencia').val("");

                        // Instaciando a table de telefones (Variável declarada no arquivo "gerenciemento_telefones.js")
                        objTablePhone.tableDestroy();
                        objTablePhone = new TablePhonesCreate();
                    }
                })
            }
        })

        // evento para interromper a submissão
        $('#formContrato').submit(function (event) {

            @if(!isset($model))
                // Variável quer armazenará os conteudos
                var telefones = [];

                // Percorrendo todos os conteudos
                $.each(objTablePhone.getTable().rows().data(),function (index, valor) {
                    telefones[index] = valor[0];
                });

                // Adicionando na requisição
                $("#telefones").val(telefones);
            @endif
        });

        /*Mascaras*/
        $(document).ready(function() {
            $('#clienteCpf').mask('000.000.000-00', {reverse: true});
            $('#searchCliente').mask('000.000.000-00', {reverse: true});
            $('#valorContrato').mask('00000,00', {reverse: true});
            $('#addPhoneText').mask('(00) 000000000');
        });
    </script>

@endsection
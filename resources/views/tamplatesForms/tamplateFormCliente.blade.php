<div class="block-header">
    <h2>Edição do cliente</h2>
</div>

<div class="card">
    <div class="card-body card-padding">
        <div class="topo-conteudo-full">
            <h4>Dados do cliente</h4>
        </div>

        <div class="row">
            <div class="form-group col-sm-8">
                <div class=" fg-line">
                    <label for="name">Nome </label>
                    {!! Form::text('name', Session::getOldInput('name'), array('readonly', 'id' => 'clienteName', 'class' => 'form-control input-sm', 'placeholder' => 'Nome completo do cliente')) !!}
                    </div>
                </div>
            <div class="form-group col-sm-4">
                <div class="fg-line">
                    <label for="cpf">CPF</label>
                    {!! Form::text('cpf', Session::getOldInput('cpf'), array('readonly', 'id' => 'clienteCpf', 'class' => 'form-control input-sm', 'placeholder' => 'CPF do cliente')) !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-4">
                <div class="fg-line">
                    <label for="agencia_id">Agência</label>
                    <div class="select">
                        {!! Form::select('agencia_id', ([["" => "Selecione uma agência"] + $loadFields['agenciacallcenter']->toArray()]), null, array('disabled', 'id' => 'clienteAgencia')) !!}
                    </div>
                </div>
            </div>

            <div class="form-group col-sm-4">
                <div class=" fg-line">
                    <label for="conta">Conta</label>
                        {!! Form::text('conta', Session::getOldInput('conta'), array('readonly', 'id' => 'clienteConta', 'class' => 'form-control input-sm', 'placeholder' => 'Conta do cliente')) !!}
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
    <script type="text/javascript" src="{{ asset('/lib/jquery-validation/src/additional/integer.js')  }}"></script>
    {{--Regras de validação--}}
    <script type="text/javascript" src="{{ asset('/dist/js/validacao/contrato.js')  }}"></script>

    {{--GERENCIAMENTO TELEFONES--}}
    <script type="text/javascript" src="{{ asset('/dist/js/contrato/gerenciamento_telefones.js')  }}"></script>
    <script type="text/javascript">
        // Instaciando a table de telefones (Variável declarada no arquivo "gerenciemento_telefones.js")
        objTablePhone = new TablePhonesEdit("{{$model->id}}");

        /*Mascaras*/
        $(document).ready(function() {
            $('#addPhoneText').mask('(00) 000000000');
        });
    </script>

@endsection
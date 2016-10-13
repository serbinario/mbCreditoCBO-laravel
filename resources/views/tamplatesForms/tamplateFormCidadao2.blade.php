

<div class="col m6 s12">
    <div class="card-panel">
        <span class="blue-text text-darken-4"><h5 >Cadastro individual</h5></span>
        <div class="divider  dark darken-4"></div>
        <br>


        <!-- Inicio Tabs -->
        <div class="row">
            <div class="col s12 m8 l12">
                <ul class="tabs">
                    <li class="tab col s12 m8 l6"><a class="active" href="#idUsuario">Identificaçao do Usuario</a></li>
                    <li class="tab col s12 m8 l6"><a  href="#infoSociodemografica">Informaçoes Sociodemograficas</a></li>
                </ul>
            </div>


            <!-- Inicio aba 1 -->
            <div id="idUsuario" class="col s12">
                <br><br>

                <div class="layout-row row">
                    <div class="col s12 m6 l12">
                        <div class="row radio-field">
                            <div class="col s12">
                                <label class="" for="id_martial_status_0">É responsável familiar</label>
                            </div>
                            <div id="id_martial_status_container" class="col s12 required inline">
                                <div id="id_martial_status" class="radio">
                                    <input type="radio" value="M" name="martial_status" id="id_martial_status_0" class="with-gap">
                                    <label for="id_martial_status_0" class="item-label">Sim</label>
                                </div>
                                <div id="id_martial_status" class="radio">
                                    <input type="radio" value="S" name="martial_status" id="id_martial_status_1" class="with-gap">
                                    <label for="id_martial_status_1" class="item-label">Não</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="layout-row row">
                    <div class="col s12 m6">
                        <div class="row">
                            <div id="id_deposit_amount_container" class="input-field col s12 required">
                                <input type="number" step="any" name="deposit_amount" id="id_deposit_amount">
                                <label for="id_deposit_amount">Nome completo *</label>

                            </div>
                        </div>
                    </div>
                    <div class="col s12 m3">
                        <div class="row radio-field">
                            <div class="col s12">
                                <label class="" for="id_martial_status_0">Sexo</label>
                            </div>
                            <div id="id_martial_status_container" class="col s12 required inline">
                                <div id="id_martial_status" class="radio">
                                    <input type="radio" value="M" name="martial_status" id="id_martial_status_0" class="with-gap">
                                    <label for="id_martial_status_0" class="item-label">Masculino</label>
                                </div>
                                <div id="id_martial_status" class="radio">
                                    <input type="radio" value="S" name="martial_status" id="id_martial_status_1" class="with-gap">
                                    <label for="id_martial_status_1" class="item-label">Feminino</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m3">
                        <div class="row">
                            <div id="id_deposit_individual_amount_container" class="input-field col s12 required">
                                <input type="number" step="any" name="deposit_individual_amount" id="id_deposit_individual_amount">
                                <label for="id_deposit_individual_amount">Nascimento</label>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="layout-row row">
                    <div class="col s12 m12 l3">
                        <div class="row">
                            <div id="id_person_title_container" class="select-field col s12 required">
                                <label for="id_person_title">Nacionalidae</label>
                                <div class="select-wrapper">
                                    <select name="person_title" id="id_person_title" class="initialized">
                                        <option value="Mr">Mr.</option>
                                        <option value="Mrs.">Mrs.</option>
                                        <option value="Ms.">Ms.</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col s12 m12 l3">
                        <div class="row">
                            <div id="id_person_title_container" class="select-field col s12 required">
                                <label for="id_person_title">Cor/Raça</label>
                                <div class="select-wrapper">
                                    <select name="person_title" id="id_person_title" class="initialized">
                                        <option value="Mr">Branco</option>
                                        <option value="Mrs.">Preto</option>
                                        <option value="Ms.">Pardo</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <span class="blue-text text-darken-4"><h5 >Documentos</h5></span>
                    <div class="divider"></div>
                    <div class="input-field col s12 m6 l2">
                        <input ng-model="new_type.max_occupancy" id="max_occupancy" type="text" >
                        <label for="max_ocdcuwpancy">N Cartão do SUS</label>
                    </div>
                    <div class="input-field col s12 m6 l2">
                        <input ng-model="new_type.max_occupancy" id="max_occupancy" type="text" >
                        <label for="max_odccwupancy">NIS</label>
                    </div>
                    <div class="input-field col s12 m6 l2">
                        <input ng-model="new_type.max_occupancy" id="max_occupancy" type="text" >
                        <label for="max_odccupanecy">CPF</label>
                    </div>
                    <div class="input-field col s12 m6 l2">
                        <input ng-model="new_type.max_occupancy" id="max_occupancy" type="text" >
                        <label for="max_odccupanecy">RG</label>
                    </div>
                    <div class="input-field col s12 m6 l2">
                        <input ng-model="new_type.max_occupancy" id="max_occupancy" type="text" >
                        <label for="max_odccupanecy">Org. Expeditor</label>
                    </div>

                </div>

                <div class="row">
                    <div class="input-field col s12 m6 l2">
                        <input ng-model="new_type.max_occupancy" id="max_occupancy" type="text" >
                        <label for="max_ocdcuwpancy">Título</label>
                    </div>
                    <div class="input-field col s12 m6 l2">
                        <input ng-model="new_type.max_occupancy" id="max_occupancy" type="text" >
                        <label for="max_odccwupancy">Zona</label>
                    </div>
                    <div class="input-field col s12 m6 l2">
                        <input ng-model="new_type.max_occupancy" id="max_occupancy" type="text" >
                        <label for="max_odccupanecy">Sessão</label>
                    </div>
                    <div class="input-field col s12 m4 l6">
                        <input ng-model="new_type.name" id="name" type="text" >
                        <label for="name">Nome Social</label>
                    </div>

                </div>

                <div class="row">
                    <div class="input-field col s12 m6 l2">
                        <select>
                            <option value="" disabled selected>Choose your option</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                        <label>Estado</label>
                    </div>
                    <div class="input-field col s12 m6 l2">
                        <select>
                            <option value="" disabled selected>Selecione</option>
                            <option value="1">Masculino</option>
                            <option value="2">Feminino</option>
                        </select>
                        <label>Cidade Nascimento</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6 l2">
                        <input ng-model="new_type.max_occupancy" id="max_occupancy" type="text" >
                        <label for="max_ocdcuwpancy">Teelfone</label>
                    </div>
                    <div class="input-field col s12 m6 l2">
                        <input ng-model="new_type.max_occupancy" id="max_occupancy" type="text" >
                        <label for="max_odccwupancy">Email</label>
                    </div>

                </div>

                <div class="row">
                    <div class="input-field col s12 m6 l2">
                        <input ng-model="new_type.max_occupancy" id="max_occupancy" type="text" >
                        <label for="max_ocdcuwpancy">Teelfone</label>
                    </div>
                    <div class="input-field col s12 m6 l2">
                        <input ng-model="new_type.max_occupancy" id="max_occupancy" type="text" >
                        <label for="max_odccwupancy">Email</label>
                    </div>

                </div>

                <div id="id_finish_date_container" class="input-field col s12 required">
                    <input type="text" name="finish_date" id="id_finish_date" data-form-control="date" data-date-format="Y-m-d">
                    <label for="id_finish_date">Expected finish date</label>

                </div>



            </div>

            <!-- Inicio aba2 -->
            <div id="infoSociodemografica" class="col s12">
                <br><br>
                <div class="row">
                    <div class="input-field col s12 m6 l4">
                        <select>
                            <option value="" disabled selected>Escolha Ocupação</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                        <label>Ocupação</label>
                    </div>

                    <div class="input-field col s12 m6 l2">
                        <label for="birthdate" class="left active">É responsável familiar</label>
                        <input class="left" name="group4" type="radio" id="rm1"  />
                        <label for="rm1">Sim</label>
                        <input name="group4" type="radio" id="rm2" />
                        <label for="rm2">Não</label>
                    </div>

                    <div class="input-field col s12 m6 l4">
                        <select>
                            <option value="" disabled selected>Selecione</option>
                            <option value="1">Masculino</option>
                            <option value="2">Feminino</option>
                        </select>
                        <label>Situação no mercado de trabalho</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12 m6 l4">
                        <select>
                            <option value="" disabled selected>Escolha Orientação Sexual</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                        <label>Deseja informar orientação sexual?</label>
                    </div>
                    <div class="input-field col s12 m6 l4">
                        <select>
                            <option value="" disabled selected>Selecione</option>
                            <option value="1">Masculino</option>
                            <option value="2">Feminino</option>
                        </select>
                        <label>Grau de formação</label>
                    </div>

                    <div class="input-field col s12 m6 l4">
                        <label for="birthdate" class="left active">Participa de grupo comunitário?</label>
                        <input class="left" name="group5" type="radio" id="pg1"  />
                        <label for="pg1">Sim</label>
                        <input name="group5" type="radio" id="pg2" />
                        <label for="pg12">Não</label>
                    </div>

                </div>

                <div class="row">

                    <div class="input-field col s12 m6 l3">
                        <label for="birthdate" class="left active">Possui plano de saúde privado?</label>
                        <input class="left" name="group6" type="radio" id="ps1"  />
                        <label for="ps1">Sim</label>
                        <input name="group6" type="radio" id="ps2" />
                        <label for="ps2">Não</label>
                    </div>

                    <div class="input-field col s12 m6 l3">
                        <label for="birthdate" class="left active">É membro de povo ou comunidade tradicional?</label>
                        <input class="left" name="group7" type="radio" id="mc1"  />
                        <label for="mc1">Sim</label>
                        <input name="group7" type="radio" id="mc2" />
                        <label for="mc2">Não</label>
                    </div>

                    <div class="input-field col s12 m4 l6">
                        <input ng-model="new_type.name" id="name" type="text" >
                        <label for="name">Qual Comunidade?</label>
                    </div>

                </div>

                <div class="row">

                    <div class="input-field col s12 m6 l3">
                        <label for="birthdate" class="left active">É usuário de algum serviço socioassistêncial?</label>
                        <input class="left" name="group8" type="radio" id="us1"  />
                        <label for="us1">Sim</label>
                        <input name="group8" type="radio" id="us2" />
                        <label for="us2">Não</label>
                    </div>

                    <div class="input-field col s12 m6 l4">
                        <select>
                            <option value="" disabled selected>Selecione</option>
                            <option value="1">Masculino</option>
                            <option value="2">Feminino</option>
                        </select>
                        <label>Qual serviço socioassistêncial?</label>
                    </div>

                </div>

                <div class="row">

                    <div class="input-field col s12 m6 l3">
                        <label for="birthdate" class="left active">É beneficiário de programa socioassistêncial?</label>
                        <input class="left" name="group8" type="radio" id="us1"  />
                        <label for="us1">Sim</label>
                        <input name="group8" type="radio" id="us2" />
                        <label for="us2">Não</label>
                    </div>

                    <div class="input-field col s12 m6 l4">
                        <select>
                            <option value="" disabled selected>Selecione</option>
                            <option value="1">Masculino</option>
                            <option value="2">Feminino</option>
                        </select>
                        <label>Qual programa socioassistêncial?</label>
                    </div>
                    <div class="input-field col s12 m4 l4">
                        <input ng-model="new_type.name" id="name" type="text" >
                        <label for="name">Outro programa socioassistêncial?</label>
                    </div>

                </div>

                <div class="row">

                    <div class="input-field col s12 m6 l3">
                        <label for="birthdate" class="left active">É usuário de alguma ONG?</label>
                        <input class="left" name="group10" type="radio" id="uog1"  />
                        <label for="uog1">Sim</label>
                        <input name="group10" type="radio" id="uog2" />
                        <label for="uog2">Não</label>
                    </div>

                </div>
                <br>

                <div class="row">
                    <div class="input-field col s12 m6 l12">
                        <input type="checkbox" id="test6"  />
                        <label for="test6">Usuário recusou o cadastro por meio do termo de recusa do cadastro</label>
                    </div>
                </div>

            </div>
        </div>
        <!-- FIM Tabs -->

        <div class="row">
            <div class="input-field col s12 m6 l12">
                <button class="btn" ng-click="create()">Salvar</button>
                <button class="btn" ng-click="create()">Voltar</button>
            </div>
        </div>


        <div class="layout-row row">

            <div class="col s12  m6 l6">
                <div class="row">
                    <div class="input-field col s12 required" id="id_first_name_container">
                        <i class="material-icons prefix">account_box</i><input id="id_first_name" name="first_name" type="text">
                        <label for="id_first_name">First name</label>

                    </div>
                </div>
            </div>

            <div class="col s12 m6">
                <div class="row">
                    <div class="input-field col s12 required" id="id_last_name_container">
                        <i class="material-icons prefix">account_box</i><input id="id_last_name" name="last_name" type="text">
                        <label for="id_last_name">Last name</label>

                    </div>
                </div>
            </div>
        </div>


    </div>
</div>


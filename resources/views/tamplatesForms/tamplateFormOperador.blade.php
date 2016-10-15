<div class="col m6 s12">
    <div class="card-panel" ng-controller="AgenteEditCrtl">
        <div class="row">
            <span class="blue-text text-darken-4"><h5>Cadastro de Agente</h5></span>
            <div class="divider"></div>
                <div class="row">
                    <div class="input-field col s12 m6 l2">
                        <input ng-model="agente.cod_operadores" id="max_occupancy" type="text" >
                        <label for="max_ocdcuwpancy">Chave J:</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6 l2">
                        <input ng-model="agente.nome_operadores" id="max_occupancy" type="text" >
                        <label for="max_odccwupancy">Nome</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6 l12">
                        <button class="btn" ng-click="save(agente)">Salvar</button>
                        <button class="btn" ng-click="create()">Voltar</button>
                    </div>
                </div>
        </div>
    </div>
</div>
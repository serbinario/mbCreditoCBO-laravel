<div class="col m6 s12">
    <div class="card-panel" ng-controller="AgenciaCrtl">
        <div class="row">
            <span class="blue-text text-darken-4"><h5 >Cadastro de Agente</h5></span>
            <div class="divider"></div>
            <div class="row">
                <div class="input-field col s12 m6 l2">
                    <input ng-model="agencia.numero" id="max_occupancy" type="text" >
                    <label for="max_ocdcuwpancy">Número:</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l2">
                    <input ng-model="agencia.nome" id="max_occupancy" type="text" >
                    <label for="max_odccwupancy">Nome:</label>
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
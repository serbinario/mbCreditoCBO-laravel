angular.module("mbCredCBO")
    .controller("AgenteCreateCrtl", function ($scope, agenciaApi){

        $scope.create = function (){
                console.log('Entrou em AgenteCrtl');
        }
    })

    .controller("AgenteEditCrtl", function ($scope, $http, agenciaApi){

        $scope.agente = [];
        $scope.save = function (){
            agenciaApi.get(function (response) {
                console.log(response.dados)
            })


            /*$http.get('/index.php/operador/getAgentes')
                    .then(function(response) {
                            console.log(response.data.dados[0].cod_operadores);

                            //$scope.agente.chaveJ = response.data.dados[0].cod_operadores;
                            $scope.agente = response.data.dados[0];
                });*/
        }
    })
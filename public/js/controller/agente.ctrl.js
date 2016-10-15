angular.module("mbCredCBO")
    .controller("AgenteCreateCrtl", function ($scope){

        $scope.create = function (){
                console.log('Entrou em AgenteCrtl');
        }
    })

    .controller("AgenteEditCrtl", function ($scope, $http){

        $scope.agente = [];
        $scope.save = function (){

                $http.get('/index.php/operador/getAgentes')
                    .then(function(response) {
                            console.log(response.data.dados[0].cod_operadores);

                            //$scope.agente.chaveJ = response.data.dados[0].cod_operadores;
                            $scope.agente = response.data.dados[0];
                });
        }
    })
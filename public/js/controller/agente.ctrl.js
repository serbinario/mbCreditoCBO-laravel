angular.module("mbCredCBO")
    .controller("AgenteCreateCrtl", function ($scope, AgenciaApi){

        $scope.create = function (){
                console.log('Entrou em AgenteCrtl');
        }
    })

    .controller("AgenteEditCrtl", function ($scope, $http, AgenciaApi){

        $scope.save = function (){
            AgenciaApi.save($scope.agente,function (response) {
                console.log(response.dados)
            })
        }

        $scope.update = function (){
            AgenciaApi.update({id:1},$scope.agente,function (response) {
                console.log(response.dados)
            })
        }

        $scope.delete = function (){
            AgenciaApi.delete({id:1},function (response) {
                console.log(response.dados)
            })
        }
    })
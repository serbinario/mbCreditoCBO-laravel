angular.module("mbCredCBO")

    .controller("AgenteCrtl", function ($scope, $http, AgenteApi) {

        //Escutando o ng-click save()
        $scope.save = function (){
            AgenteApi.save($scope.agente, function () {
                console.log('Entrou em store')

            })
        }

        $scope.edit = function (idAgente){
            AgenteApi.edit({id:idAgente}, $scope, function (data) {
                $scope.agente = data;

            })
        }

        $scope.update = function (){
            AgenciaApi.update({id:1}, $scope.agente,function (response) {
                console.log(response.dados)
            })
        }

        $scope.delete = function (){
            AgenciaApi.delete({id:1},function (response) {
                console.log(response.dados)
            })
        }

    });
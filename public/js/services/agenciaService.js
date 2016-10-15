angular.module('mbCredCBO')
    .factory('agenciaApi', function($resource) {
        return $resource('/index.php/operador/getAgentes/:id'); // Note the full endpoint address
    });
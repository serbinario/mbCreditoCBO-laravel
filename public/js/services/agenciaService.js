angular.module('mbCredCBO')
    .factory('Entry', function($resource) {
        return $resource('/api/entries/:id'); // Note the full endpoint address
    });
angular.module("mbCredCBO", ['ngResource', 'datatables'], function ($interpolateProvider){
    $interpolateProvider.startSymbol('[[').endSymbol(']]');
})
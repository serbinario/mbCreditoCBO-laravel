angular.module("mbCredCBO", ['ngResource'], function ($interpolateProvider){
    $interpolateProvider.startSymbol('[[').endSymbol(']]');
})
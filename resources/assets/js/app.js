'use strict';

angular
.module('crApp', [ 'ui.router', 'ngValidate' ])
.config([ '$locationProvider', '$stateProvider', '$urlRouterProvider', function ($locationProvider, $stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise('/');

    $locationProvider.html5Mode(true);

    $stateProvider
        .state('home', {
            url: '/',
            templateUrl: '/view/home.html',
        })
        .state('add', {
            url: '/add',
            templateUrl: '/view/form.html',
            controller: 'addCtrl'
        })
        .state('list', {
            url: '/list?page',
            templateUrl: '/view/list.html',
            controller: 'listCtrl',
            params: {
                page: {
                    value: '0',
                    squash: true
                }
            }
        })
}]);


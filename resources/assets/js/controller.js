'use strict';

angular
.module('crApp')
.controller('addCtrl', [ '$scope', '$http', function ($scope, $http) {
    $scope.validationOptions = {};
    $scope.submitForm = function(form){
          if(form.validate()) {

          }
    }; 
}]);


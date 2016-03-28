'use strict';

angular
.module('crApp')
.controller('addCtrl', [ '$scope', '$http', function ($scope, $http) {
    $scope.validationOptions = {};
    $scope.submitForm = function(form){
          if(form.validate()) {
              $scope.error = null;
              $http.post('/api/v1/info', $scope.info)
                  .success(function(response, status){
                      $scope.formRes = response;
                      $scope.error = null;
                      $scope.info = {};
                  })
              .error(function(response){
                  $scope.error = response;
              })
          }
    }; 
}])
.controller('listCtrl', [ '$scope', '$http', function ($scope, $http) {
    $http.get('/api/v1/info')
        .success(function(response, status){
                    $scope.data = response.data;
                })
}]);

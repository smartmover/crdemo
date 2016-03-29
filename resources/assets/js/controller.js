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
.controller('listCtrl', [ '$scope', '$http', '$stateParams', function ($scope, $http, $stateParams) {
    $scope.perPage = 5;
    $scope.currentPage = ($stateParams.page == 0) ? 1 : $stateParams.page;
    $http.get('/api/v1/info?limit='+$scope.perPage+'&page='+$scope.currentPage)
        .success(function(response, status){
            $scope.data = response.data;
            $scope.total = Math.ceil(response.meta.cursor.count/$scope.perPage);
        })

    $scope.range = function(n) {
        return new Array(n);
    };
}])

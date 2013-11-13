'use strict';

/* Controllers */

angular.module('cctApp.controllers', []).
  controller('MyCtrl1', function($scope, $http) {
        $http.get('/data/schools.php').success(function(response) {
            console.log(response);
            $scope.schools = response;
        });

  })
  .controller('MyCtrl2', [function() {

  }]);
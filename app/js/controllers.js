'use strict';

/* Controllers */

angular.module('cctApp.controllers', []).
  controller('MyCtrl1', function($scope, $http) {
        $http.get('data/schools.php').success(function(response) {
            $scope.schools = response;
        });


        $scope.sort = {
            column: 'name',
            descending: false
        };

        $scope.changeSorting = function(column) {
            var sort = $scope.sort;

            if (sort.column == column) {
                sort.descending = !sort.descending;
            } else {
                sort.column = column;
                sort.descending = false;
            }
        };

  })
  .controller('MyCtrl2', [function() {

  }]);

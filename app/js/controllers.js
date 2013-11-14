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
        $scope.activePosition = -1;
        $scope.toggleDetail = function($index) {
            console.log($index);
            //$scope.isVisible = $scope.isVisible == 0 ? true : false;
            $scope.activePosition = $scope.activePosition == $index ? -1 : $index;
        };
  })
  .controller('MyCtrl2', [function() {

  }]);

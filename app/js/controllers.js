'use strict';

/* Controllers */

angular.module('cctApp.controllers', [])
    .controller('CommModalController', function ($scope, $modalInstance) {

        $scope.ok = function () {
            $modalInstance.close();
        };

        $scope.cancel = function () {
            $modalInstance.dismiss('cancel');
        };
    })
    .controller('MyCtrl1', function($scope, $http, $modal, $log) {
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

        $scope.openComm = function () {

            var modalInstance = $modal.open({
                templateUrl: 'partials/commDetail.html?test=fjdkls',
                controller: 'CommModalController',
                resolve: {
                    items: function () {
                        return 1;
                    }
                }
            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
        };

  });

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
        $scope.selectedSchool = -1;
        $scope.toggleDetail = function($index, schoolid) {
            $scope.activePosition = $scope.activePosition == $index ? -1 : $index;
            $scope.selectedSchool = $scope.selectedSchool == schoolid ? -1 : schoolid;
        };

        $scope.openComm = function (contact) {
            $scope.contact = contact;
            $scope.tempContact = angular.copy(contact);

            var modalInstance = $modal.open({
                templateUrl: 'partials/commDetail.html?i=0',
                controller: 'CommModalController',
                scope: $scope,
                resolve: {
                    contact: function () {
                        return $scope.contact;
                    }
                }
            });

            modalInstance.result.then(function () {
            }, function () {
                contact.date = $scope.tempContact.date;
                contact.type = $scope.tempContact.type;
                contact.description = $scope.tempContact.description;
                contact.content = $scope.tempContact.content;
                $log.info('Modal dismissed at: ' + new Date());
            });
        };

  });

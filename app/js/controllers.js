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

        $scope.tableRowExpanded = false;
        $scope.tableRowIndexExpandedCurr = "";
        $scope.tableRowIndexExpandedPrev = "";
        $scope.schoolIdExpanded = "";

        $scope.schoolRowCollapseFn = function () {
            $scope.schoolRowCollapse = [];
            for (var i = 0; i < $scope.schools.school.contacts.length; i += 1) {
                $scope.schoolRowCollapse.push(false);
            }
        };
        $scope.selectTableRow = function (index, schoolId) {
            if (typeof $scope.schoolRowCollapse === 'undefined') {
                $scope.schoolRowCollapseFn();
            }

            if ($scope.tableRowExpanded === false && $scope.tableRowIndexExpandedCurr === "" && $scope.storeIdExpanded === "") {
                $scope.tableRowIndexExpandedPrev = "";
                $scope.tableRowExpanded = true;
                $scope.tableRowIndexExpandedCurr = index;
                $scope.storeIdExpanded = schoolId;
                $scope.schoolRowCollapse[index] = true;
            } else if ($scope.tableRowExpanded === true) {
                if ($scope.tableRowIndexExpandedCurr === index && $scope.storeIdExpanded === schoolId) {
                    $scope.tableRowExpanded = false;
                    $scope.tableRowIndexExpandedCurr = "";
                    $scope.storeIdExpanded = "";
                    $scope.schoolRowCollapse[index] = false;
                } else {
                    $scope.tableRowIndexExpandedPrev = $scope.tableRowIndexExpandedCurr;
                    $scope.tableRowIndexExpandedCurr = index;
                    $scope.storeIdExpanded = schoolId;
                    $scope.schoolRowCollapse[$scope.tableRowIndexExpandedPrev] = false;
                    $scope.schoolRowCollapse[$scope.tableRowIndexExpandedCurr] = true;
                }
            }

        };
  })
  .controller('MyCtrl2', [function() {

  }]);

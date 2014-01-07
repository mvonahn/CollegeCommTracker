'use strict';

/* Controllers */

angular.module('cctApp.controllers', [])
    .controller('CommModalController', function ($scope, $modalInstance, $http) {

        $scope.ok = function () {
            var contact = $scope.contact;
            contact.date = $scope.convertToUTC(contact.date);
            $http.post('/ws/user/contact/' + contact.Id, {'TypeId': contact.type, "UniversityId": contact.UniversityId, 'CommunicationDate': contact.date, 'Description': contact.description, "Content": contact.content}
                    ).success(function(data, status, headers, config) {
                        console.log(data);
                    });

            $modalInstance.close();
        };

        $scope.cancel = function () {
            $modalInstance.dismiss('cancel');
        };
    })
    .controller('MyCtrl1', function($scope, $http, $modal, $log) {

        $http.get('/ws/user/contact').success(function(response) {
            $scope.schools = response;
        });

        $http.get('/ws/university').success(function(response) {
            $scope.universities = response;
        });

        $scope.addContact = function(){
            var newContact = new Array();
            newContact.date = new Date();
            newContact.type = '1';
            newContact.description = '';
            newContact.content = '';
            newContact.Id = 0;
            newContact.UniversityId = 1;
            newContact.UserId = 1;

            $scope.openComm(newContact);

        };
        $scope.sort = {
            column: 'name',
            descending: false
        };

    $scope.convertToUTC = function(dt) {
        var localDate = new Date(dt);
        var localTime = localDate.getTime();
        var localOffset = localDate.getTimezoneOffset() * 60000;
        return new Date(localTime + localOffset);
    };

        $scope.isNewContact = function(contact){
            return (contact.ID == 1);
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
                templateUrl: 'partials/commDetail.html?i=7',
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
                        $http.get('/ws/user/contact').success(function(response) {
                            $scope.schools = response;
                            console.log('reloading schools');
                        });
            });
        };

      $scope.format = 'yyyy/MM/dd';
      $scope.today = function() {
        $scope.dt = new Date();
      };
      $scope.today();

      $scope.showWeeks = false;

      $scope.clear = function () {
        $scope.dt = null;
      };

      $scope.dateOptions = {
        'year-format': "'yy'",
        'starting-day': 1,
        'show-weeks' : false
      };

  });

var formApp = angular.module('formApp', ['ngSanitize']);
formApp.controller('formController', function ($scope, $http) {
    $scope.html = {};

    $scope.processForm = function (formData) {
        $http.post('/search_module/main/html', formData).success(function (data, status, headers, config) {
            console.log(data);
            $scope.html = {
                data: data
            };
        }).error(function () {
            console.log('error:'.data);
        });
    };
    $scope.getRes = function (id) {
        $http.post('/search_module/results/get_results', id).success(function (data, status, headers, config) {
            console.log(data);
            $scope.html = {
                data: data
            };
        }).error(function () {
            console.log('error:'.data);
        });
    }

});


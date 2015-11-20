var appAdmin = angular.module('AdminApp', ['ngResource', 'ui.bootstrap'],
    function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    }
);

appAdmin.factory('ApiRequest', ['$resource', function($resource) {
    return $resource('/list', {}, {
        'GetAll' : {method: 'GET', isArray: true},
        'UpdateNote' : {method: 'POST'}
    });
}]);

appAdmin.controller('AdminController', ['$scope', 'ApiRequest', function($scope, ApiRequest) {
    $scope.customers = ApiRequest.GetAll();
}]);

appAdmin.directive('adminEdit', function() {
    return {
        restrict: 'E',
        controller: 'AdminEditController',
        scope: {
            info: '='
        },
        templateUrl: 'tpl/adminEdit.html'
    };
});

appAdmin.controller('AdminEditController', ['$scope', 'ApiRequest', '$log', function($scope, ApiRequest, $log) {
    $scope.editNote = function() {
        $scope.view = true;
    };

    $scope.updateNote = function(id, note) {
        ApiRequest.UpdateNote({id: id, note: note}, function(resp) {
            $scope.info['note'] = resp.note;
        }, function(err) {
            $scope.info['note'] = 'request error';
            $log.error(err);

        });
        $scope.view = false;
    };
}]);
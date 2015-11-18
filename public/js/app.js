var appAuto = angular.module('AutoHelp', ['ngAnimate', 'ngMessages', 'ngResource', 'ui.bootstrap'],
    function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    }
);

appAuto.factory('SiteText', ['$http', function($http) {
    var TextService = {};
    TextService.getText = function() {
        var text = {};
        $http.get('tpl/SiteText.json').then(function(resp) {
            angular.forEach(resp.data, function(val, key) {
                text[key] = val;
            });
        });
        return text;
    };
    return TextService;
}]);

appAuto.factory('ApiRequest', ['$resource', function($resource) {
    return $resource('/help', {}, {
        'SendMsg' : {method: 'POST', isArray: false}
    });
}]);

appAuto.controller('MainController', ['$scope', '$uibModal', 'SiteText', function($scope, $uibModal, SiteText) {
    $scope.txt = SiteText.getText();

    $scope.open = function () {
        $uibModal.open({
            animation: true,
            templateUrl: 'tpl/ModalContent.html',
            controller: 'ModalInstanceController'
        });
    };
}]);

appAuto.controller('ModalInstanceController', function ($scope, $uibModal, $uibModalInstance, ApiRequest) {
    $scope.form_data = {};
    $scope.submitForm = function(isValid) {
        if (isValid) {
            ApiRequest.SendMsg($scope.form_data);
            $uibModalInstance.close($uibModal.open({
                animation: true,
                templateUrl: 'tpl/ModalThanks.html'
            }));
        }
    };
});
var appAuto = angular.module('AutoHelp', ['ngAnimate', 'ngMessages', 'ui.bootstrap'],
    function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    }
);

appAuto.controller('MainController', ['$scope', '$uibModal', '$log', function($scope, $uibModal) {
    $scope.open = function () {
        $uibModal.open({
            animation: true,
            templateUrl: 'tpl/ModalContent.html',
            controller: 'ModalInstanceCtrl'
        });
    };
}]);

appAuto.controller('ModalInstanceCtrl', function ($scope, $uibModal, $uibModalInstance, $log) {
    $scope.form_data = {};
    $scope.submitForm = function(isValid) {
        if (isValid) {
            $log.info('send to the factory');
            $log.info($scope.form_data);
            $uibModalInstance.close($uibModal.open({
                animation: true,
                templateUrl: 'tpl/ModalThanks.html'
            }));
        }
    };
});
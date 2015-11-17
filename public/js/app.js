var appAuto = angular.module('AutoHelp', ['ui.bootstrap'],
    function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    }
);

appAuto.controller('MainController', ['$scope', function($scope) {

}]);
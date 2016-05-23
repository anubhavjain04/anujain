"use strict";
var MenuCtrl = function($scope, $rootScope, $state, $stateParams, Session, $location) {
    $scope.isCollapsed = 1;
    $scope.global = Session.sessionData;
    $scope.$watch("global.currentUser", function(newvalue, oldvalue){
        if(newvalue && !angular.equals(newvalue, oldvalue)){
            var returnObject = $location.search();
            if(returnObject && returnObject.returnTo){
                $location.path(returnObject.returnTo).search("returnTo", null);
            }
        }
    });
    $scope.logout = function(){
        Session.logout();
    };
    $rootScope.$on('$stateChangeSuccess', function () {
        $scope.stateParams = $stateParams;
        $scope.currentState = $state.current;
    });
};
angular.module("BJMMatrimony").controller("MenuCtrl", MenuCtrl);
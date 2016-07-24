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

    /***Toggled Menu***/
    $scope.isOpened = false;

    var _checkMenu = function(event){
        var targetElement = $(event.target || event.srcElement);
        var sidebarElement = event.data.container.find(event.target);
        if(targetElement.is(event.data.container) || (sidebarElement.length>0 && !targetElement.is("a"))){
            return;
        }
        $("body").off("click.sidebar-menu", _checkMenu);
        if($scope.isOpened) {
            $scope.isOpened = false;
            $scope.$digest();
        }
    };

    $scope.toggleMenu = function(){
        $scope.isOpened = !$scope.isOpened;
        if($scope.isOpened){
            setTimeout(function(){
                var sidebarElement = $("#sidebar-wrapper");
                $("body").on("click.sidebar-menu", {"container": sidebarElement}, _checkMenu);
            }, 0);
        }
    };

    /***state changes***/
    $rootScope.$on('$stateChangeSuccess', function () {
        $scope.stateParams = $stateParams;
        $scope.currentState = $state.current;
    });
};
angular.module("BJMMatrimony").controller("MenuCtrl", MenuCtrl);
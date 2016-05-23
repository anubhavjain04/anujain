"use strict";

var LoginCtrl = function($scope, $rootScope, Session) {
    $scope.user = {email: "", password: "", rememberMe: 1};
    $scope.global = Session.sessionData;
    $scope.isLogging = $rootScope.isLogging;
    $scope.login = function() {
        Session.login({"LoginForm": {"emailid": $scope.user.email, "password": $scope.user.password, "rememberMe": $scope.user.rememberMe}});
    }
    $scope.forgotPassword = function(){

    };
};

angular.module("BJMMatrimony").controller("LoginCtrl", LoginCtrl);
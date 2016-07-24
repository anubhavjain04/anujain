"use strict";
var MainCtrl = function($scope, $rootScope, $http, $serverPath, $state, $timeout, $version, Session) {
    $scope.global = Session.sessionData;
    $scope.version = $version;
    $scope.isStateLoading = false;
    $scope.signUpForm = false;

    $scope.showSignUp = function () {
        $scope.signUpForm = true;
    };

    $rootScope.showAlert = function(message){
        $scope.alertMessage = message;
    };
};

angular.module("BJMMatrimony").controller("MainCtrl", MainCtrl);
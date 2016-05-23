"use strict";
var MainCtrl = function($scope, $rootScope, $http, $serverPath, $state, $timeout, Session) {
    $scope.global = Session.sessionData;
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
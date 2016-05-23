"use strict";
var LogoutCtrl = function($scope, Session, $location, $rootScope){
    Session.logout();
};

angular.module("BJMMatrimony").controller("LogoutCtrl", LogoutCtrl);
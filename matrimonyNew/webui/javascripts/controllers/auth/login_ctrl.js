var LoginCtrl = function($scope, $rootScope, $state, Session) {
    $scope.user = {email: "", password: "", rememberMe: 1};
    $scope.global = Session.sessionData;
    $scope.isLogging = $rootScope.isLogging;

    var errorCallback = function(){
        if($state.current.name != "login"){
            $state.go("login");
        }
    };

    $scope.login = function() {
        Session.login({"LoginForm": {"emailid": $scope.user.email, "password": $scope.user.password, "rememberMe": $scope.user.rememberMe}}, undefined, errorCallback);
    };
    $scope.forgotPassword = function(){

    };
};

angular.module("BJMMatrimony").controller("LoginCtrl", LoginCtrl);
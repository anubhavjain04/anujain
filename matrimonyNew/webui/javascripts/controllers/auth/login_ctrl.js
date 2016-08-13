var LoginCtrl = function($scope, $rootScope, $state, $uibModal, Session, $modalRoutes) {
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
        var modalInstance = $uibModal.open({
            templateUrl: $modalRoutes["forgotPassword"],
            controller: ForgotPasswordCtrl
        });
    };
};

angular.module("BJMMatrimony").controller("LoginCtrl", LoginCtrl);
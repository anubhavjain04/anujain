var ResetPasswordCtrl = function($scope, $rootScope, $state, $stateParams, UserFactory) {
    $scope.newPassword = "";
    $scope.confirmPassword = "";
    $scope.disableButton = false;

    var resetToken = $stateParams.resetToken;

    $scope.change = function(){
        if($scope.validateForm()){
            $scope.disableButton = true;

            UserFactory.resetPassword({"user":{"resetPasswordToken":resetToken, "newPassword": $scope.newPassword, "confirmPassword": $scope.confirmPassword}}).then(function(data){
                $scope.disableButton = false;
                if(data && data.status === 200) {
                    $rootScope.$emit('addFlash', [{
                        type: 'success',
                        msg: 'Your password has been changed successfully.'
                    }]);
                    $state.go("login");
                }else {
                    $scope.$root.showAlert("Something went wrong when saving password. Try after some time...");
                }
            },function(error){
                $scope.disableButton = false;
                if(error && error.status){
                    $scope.$root.showAlert(error.message);
                }else{
                    $scope.$root.showAlert("Something went wrong, please try after some time.");
                }
            });
        }
    };

    $scope.validateForm = function(){
        if($scope.myForm.$valid){
            return true;
        }else{
            angular.forEach($scope.myForm.$error, function (field) {
                angular.forEach(field, function(errorField){
                    errorField.$setTouched();
                })
            });
            $(window).scrollTop(0);
            return false;
        }
    };
};
angular.module("BJMMatrimony").controller("ResetPasswordCtrl", ResetPasswordCtrl);
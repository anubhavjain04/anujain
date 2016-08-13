var ForgotPasswordCtrl = function($scope, $state, UserFactory) {
    $scope.email = "";
    $scope.disableButton = false;
    $scope.isDone = false;
    $scope.successMessage = "";
    $scope.errorMessage = "";

    $scope.sendResetPassword = function(){
        if($scope.email && $scope.validateForm()){

            $scope.disableButton = true;
            $scope.errorMessage = "";
            $scope.successMessage = "";

            UserFactory.forgotPassword({"emailid": $scope.email}).then(function(data){
                $scope.disableButton = false;
                if(data && data.status === 200) {
                    $scope.isDone = true;
                    $scope.successMessage = data.message;
                }else {
                    console.log(data);
                    $scope.errorMessage = "Error: 500, Internal Server Error";
                }
            },function(error){
                $scope.disableButton = false;
                $scope.successMessage = "";
                if(error && error.status){
                    $scope.errorMessage = error.message;
                }else{
                    $scope.errorMessage = "Something went wrong, please try after some time.";
                }
            });
        }
    };

    $scope.validateForm = function(){
        if($scope.forgotForm.$valid){
            return true;
        }else{
            angular.forEach($scope.forgotForm.$error, function (field) {
                angular.forEach(field, function(errorField){
                    errorField.$setTouched();
                })
            });
            $(window).scrollTop(0);
            return false;
        }
    };
};
angular.module("BJMMatrimony").controller("ForgotPasswordCtrl", ForgotPasswordCtrl);
var ChangePasswordCtrl = function($scope, $rootScope, $serverPath, $state, Session, FacetFactory, MemberFactory) {
    $scope.facetVM = FacetFactory;
    $scope.global = Session.sessionData;
    $scope.user = $scope.global.currentUser;

    $scope.oldPassword = "";
    $scope.newPassword = "";
    $scope.confirmPassword = "";
    $scope.disableButton = false;

    $scope.change = function(){
        if($scope.user && $scope.validateForm()){
            var formData = {
                oldPassword 	: $scope.oldPassword,
                newPassword 	: $scope.newPassword
            };
            $scope.disableButton = true;
            MemberFactory.changePassword($scope.user.fkLoginId, formData).then(function(data){
                if(data){
                    $scope.disableButton = false;
                    if(data.status == 'success'){
                        $rootScope.$emit('addFlash', [{
                            type: 'success',
                            msg: 'Your password has been changed successfully.'
                        }]);
                        $state.go("userHome");
                    }else{
                        $scope.$root.showAlert("Something went wrong when saving password. Try after some time...");
                    }
                }
            },function(error){
                $scope.disableButton = false;
                if(error && error.status === 403){
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
angular.module("BJMMatrimony").controller("ChangePasswordCtrl", ChangePasswordCtrl);
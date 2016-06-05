var RegisterMainCtrl = function($scope, $state) {
    $scope.showPage = "register-member";
    $scope.userObj = $scope.$root.tempUserObj;
    if($scope.userObj){
        $scope.showPage = "member-profile";
    }
    $scope.userDetails = undefined;
    $scope.alertMessage = undefined;
    $scope.$root.tempUserObj = undefined;
    $scope.showRegisterationPage = function(){
        var showPage = 'register-member';
        $scope.showPage = showPage;
    };
    $scope.showRegisterProfilePage = function (userObj) {
        if (userObj) {
            $scope.userObj = userObj;
            $scope.showPage = 'member-profile';
        }
    };
    $scope.showConfirmationPage = function (userDetails) {
        if (userDetails) {
            $scope.userDetails = userDetails;
            $scope.showPage = 'confirmation';
        }
    };
    $scope.redirectToMemberProfile = function (userObj) {
        $scope.$root.tempUserObj = userObj;
        $state.go("register");
    };
    //$scope.showAlert = function(message){
    //    $scope.alertMessage = message;
    //};

};
angular.module("BJMMatrimony").controller("RegisterMainCtrl", RegisterMainCtrl);
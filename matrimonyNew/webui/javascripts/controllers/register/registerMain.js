var RegisterMainCtrl = function($scope, $state, $stateParams) {
    $scope.showPage = "register-member";
    $scope.userObj = undefined;
    $scope.userDetails = undefined;
    $scope.alertMessage = undefined;
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
    //$scope.showAlert = function(message){
    //    $scope.alertMessage = message;
    //};

};
angular.module("BJMMatrimony").controller("RegisterMainCtrl", RegisterMainCtrl);
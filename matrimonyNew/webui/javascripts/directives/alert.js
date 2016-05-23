var AlertCtrl = function($scope, $uibModal){
    var modalInstance = undefined;
    $scope.openModal = function(template){
        modalInstance = $uibModal.open({
            templateUrl: template,
            scope: $scope
        });
        modalInstance.result.then(function () {
            $scope.message = undefined;
            modalInstance = undefined;
        }, function(){
            $scope.message = undefined;
            modalInstance = undefined;
        });
    };
    $scope.close = function(){
        if(modalInstance){
            modalInstance.dismiss('cancel');
            modalInstance = undefined;
            if(angular.isFunction($scope.onCloseClick)){
                $scope.onCloseClick();
            }
        }
    };
    $scope.$watch("message", function(newvalue){
        if(newvalue){
            $scope.openModal("directives/alert.html");
        }else{
            $scope.close();
        }
    });
};
var BjmAlert = function(){
    return {
        restrict: 'E',
        replace: true,
        controller: AlertCtrl,
        scope: {
            message: '=',
            onCloseClick: '&'
        }
    };
};
angular.module("BJMMatrimony").directive("bjmAlert", BjmAlert);
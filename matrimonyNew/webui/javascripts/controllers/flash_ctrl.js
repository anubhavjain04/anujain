var FlashCtrl = function($scope, $rootScope, $timeout) {
    // alert object = {"type":danger, "msg": "error message"}
    $scope.flash = [];
    $scope.closeAlert = function(index) {
        $scope.flash.splice(index, 1);
    };

    $scope.$watchCollection("flash", function(newValue) {
        if ($scope.flash) {
            angular.forEach($scope.flash, function (alert) {
                if (!alert.expirationTimer) {
                    alert.expirationTimer = true;
                    $timeout(function () {
                        var i = $scope.flash.indexOf(alert);
                        $scope.closeAlert(i);
                        return;
                    }, 5000);
                }
            });
            $(window).scrollTop(0);
        }
    });

    $rootScope.$on('addFlash', function(event, alerts) {
        if(alerts && angular.isArray(alerts)) {
            angular.forEach(alerts, function(alert) {
                $scope.flash.push(alert);
            });
        }
    });
};
angular.module("BJMMatrimony").controller("FlashCtrl", FlashCtrl);
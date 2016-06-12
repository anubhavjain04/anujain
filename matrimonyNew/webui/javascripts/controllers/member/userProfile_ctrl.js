var UserProfileCtrl = function($scope, $state, Session) {
    var profiles = [
        "/basic-details",
        "/horoscope",
        "/professional-details",
        "/family-details",
        "/partner-preference",
        "/contact-details",
        "/change-photo",
        "/change-password",
        "/deactivate-profile"
    ];
    $scope.global = Session.sessionData;
    $scope.user = Session.sessionData.currentUser;
    var profileType = $state.current.url;
    if(!(profileType!="/member-profile" && profiles.indexOf(profileType) > -1)){
        $state.go("userProfile.basicDetails");
    }
};
angular.module("BJMMatrimony").controller("UserProfileCtrl", UserProfileCtrl);
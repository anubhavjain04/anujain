"use strict";

this.app = angular.module("BJMMatrimony", [
    "ngResource",
    "ngMessages",
    "ipCookie",
    "ngRoute",
    "ui.router",
    "ui.bootstrap",
    "ui.checkbox",
    "ngFileUpload",
    "ngImgCrop",
    "templates-main"
]);


Offline.options = {checks: {xhr: {url: 'dist/images/favicon.ico'}}};

var _isMobile = (function() {
    var check = false;
    (function(a) {
        if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) {
            check = true;
        }
    })(navigator.userAgent || navigator.vendor || window.opera);
    return check;
})();

this.app.value("$serverPath", sitePath);
this.app.value("$siteBaseUrl", siteBaseUrl);
this.app.value("$isMobile", _isMobile);

this.app.config(function($stateProvider, $urlRouterProvider) {
    $urlRouterProvider.otherwise("/");
    $stateProvider.state('home', {
        url: "/",
        templateUrl: "home/home.html",
        controller: "MainCtrl"
    }).state('search', {
        url: "/search",
        templateUrl: "search/search.html",
        controller: "SearchCtrl"
    }).state('searchResults', {
        url: "/search/results?sex&ageFrom&ageTo&heightFrom&heightTo&maritalStatus&sect&subsect&caste&mothertongue&educationGroup&occupationGroup&physicalStatus&employedIn&country",
        templateUrl: "search/searchResults.html",
        controller: "SearchResultsCtrl"
    }).state('searchMember', {
        url: "/search/member/:memberCode",
        templateUrl: "search/memberDetailsPage.html",
        controller: "SearchMemberCtrl"
    }).state('register', {
        url: "/register",
        templateUrl: "register/register.html",
        controller: "RegisterMainCtrl"
    }).state('login', {
        url: "/login",
        templateUrl: "auth/login.html",
        controller: "LoginCtrl"
    }).state('aboutUs', {
        url: "/about-us",
        templateUrl: "static/aboutus.html"
    }).state('contactUs', {
        url: "/contact-us",
        templateUrl: "static/contactus.html"
    }).state('privacyPolicy', {
        url: "/privacy-policy",
        templateUrl: "static/privacypolicy.html"
    }).state('termsNConditions', {
        url: "/terms-n-conditions",
        templateUrl: "static/termsnconditions.html"
    }).state('userHome', {
        url: "/home",
        templateUrl: "member/my-matrimony.html",
        controller: "MemberCtrl"
    }).state('userProfile', {
        url: "/member-profile",
        templateUrl: "member/user-profile.html",
        controller: "UserProfileCtrl"
    }).state('userProfile.basicDetails', {
        url: "/basic-details",
        templateUrl: "member/basic-details.html",
        controller: "MemberCtrl"
    }).state('userProfile.horoscope', {
        url: "/horoscope",
        templateUrl: "member/horoscope.html",
        controller: "MemberCtrl"
    }).state('userProfile.professionalDetails', {
        url: "/professional-details",
        templateUrl: "member/professional-details.html",
        controller: "MemberCtrl"
    }).state('userProfile.familyDetails', {
        url: "/family-details",
        templateUrl: "member/family-details.html",
        controller: "MemberCtrl"
    }).state('userProfile.partnerPreference', {
        url: "/partner-preference",
        templateUrl: "member/partner-preference.html",
        controller: "MemberCtrl"
    }).state('userProfile.contactDetails', {
        url: "/contact-details",
        templateUrl: "member/contact-details.html",
        controller: "MemberCtrl"
    }).state('userProfile.changePhoto', {
        url: "/change-photo",
        templateUrl: "member/change-photo.html",
        controller: "UploadPhotoCtrl"
    }).state('userProfile.changePassword', {
        url: "/change-password",
        templateUrl: "member/change-password.html",
        controller: "ChangePasswordCtrl"
    });

});

this.app.factory("authHttpResponseInterceptor", function($q, $location, $rootScope){
    return {
        response: function(response) {
            if(response.status == 401) {
                console.log("Response 401");
            }
            return response || $q.when(response);
        },
        responseError: function(rejection) {
            if(rejection.status == 401) {
                console.log("Response error 401", rejection)
                var returnPath = $location.path();
                if (returnPath != '/login') {
                    $location.path("/login").search("returnTo", returnPath);
                    $rootScope.$emit("sessionExpired");
                }
            }
            return $q.reject(rejection);
        }
    };
});

this.app.config(function($httpProvider) {
    //$httpProvider.defaults.useXDomain = true;
    //$httpProvider.defaults.withCredentials = true;
    //$httpProvider.defaults.headers.post = {'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'};
    $httpProvider.defaults.headers.common.Accept = 'application/json, text/javascript, */*; q=0.01';
    //return delete $httpProvider.defaults.headers.common['X-Requested-With'];

    //Http Intercpetor to check auth failures for xhr requests
    $httpProvider.interceptors.push('authHttpResponseInterceptor');
});

this.app.run([
    '$rootScope', '$location', 'ipCookie', '$http', '$browser', 'Session', '$timeout', function($rootScope, $location, ipCookie, $http, $browser, Session, $timeout) {
        Session.setAuthorization();
        var isAllowed = function(path){
            return [
                    "/",
                    "/login",
                    "/about-us",
                    "/contact-us",
                    "/privacy-policy",
                    "/terms-n-conditions",
                    "/search",
                    "/search/results",
                    "/register"
                ].indexOf(path) != -1;
        };
        $rootScope.$on('$stateChangeStart', function(event, toState, toParams, fromState, fromParams){
            angular.element("#ajaxLoader").show();
        });

        $rootScope.$on('$stateChangeSuccess', function(event, toState, toParams, fromState, fromParams){
            //$timeout(function() {
                angular.element("#ajaxLoader").hide();
            //}, 100);
            angular.element(window).scrollTop(0);
        });

        $rootScope.toggleClass = function(element, className){
            $(element).toggleClass(className);
        };
        $rootScope.$on('$locationChangeStart', function(event, newUrl, oldUrl) {
            var currentPath = $location.path();
            if((currentPath == '/' || currentPath == '') && !Session.sessionData.auth){
                Session.sessionData.isLandingPage = true;
            }else {
                Session.sessionData.isLandingPage = false;
            }
            // redirect to login page if not logged in
            if(currentPath == '') {
                $location.path('/');
            }
            else if(currentPath && !isAllowed(currentPath) && !Session.sessionData.currentUser) {
                $location.path('/login').search("returnTo", currentPath);
            }else if(currentPath == '/' && Session.sessionData.currentUser){
                $location.path("/home");
            }
        });
    }
]);

angular.element(document).ready(function() {
    angular.bootstrap(document, ['BJMMatrimony']);
});

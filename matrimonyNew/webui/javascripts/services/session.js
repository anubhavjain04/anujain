"use strict";
var Session = function(RESTUtil, $q, $location, $rootScope, ipCookie, $state){
    var Global = {
        currentUser: null,
        profilePicData: null,
        auth: null
    };

    var setCredentials = function(data) {
        //$http.defaults.headers.common['X-User-Email'] = data.user.email;
        //$http.defaults.headers.common['X-User-Token'] = data.authentication_token;
        var auth = {"id": data.pkMemberId, "email": data.Email};
        ipCookie("auth", auth, { expires: 30 });
        Global.currentUser = data;
        Global.auth = auth;
        userProfilePic(Global.currentUser);
    };

    var clearCredentials = function() {
        ipCookie.remove('auth');
        Global.auth = null;
        Global.profilePicData = null;
        //delete $http.defaults.headers.common['X-User-Email'];
        //delete $http.defaults.headers.common['X-User-Token'];
        Global.currentUser = null;
    };

    var isAuthorized = function() {
        var auth = ipCookie('auth');
        if(auth && auth.id) {
            Global.auth = auth;
        }
        //$http.defaults.headers.common['X-User-Email'] = auth.email;
        //$http.defaults.headers.common['X-User-Token'] = auth.token;
        return (auth && auth.id);
    };

    var userProfilePic = function(user){
        if(user && user.pkMemberId){
            RESTUtil.get("matrimonyMembers/userProfilePic/id/"+user.pkMemberId).then(function(resp){
                Global.profilePicData = resp;
            });
        }
    };

    var login = function(data, successcallback, errorcallback) {
        $rootScope.isLogging = true;
        RESTUtil.post("site/login", data).then(function(resp){
            if(resp){
                setCredentials(resp);
                if (angular.isFunction(successcallback)) {
                    successcallback(resp);
                }
                var returnObject = $location.search();
                if(returnObject && returnObject.returnTo){
                    $location.path(returnObject.returnTo).search("returnTo", null);
                }else {
                    $state.go('userHome');
                }
            }
        }, function(resp){
            if(resp.status==403){
                $rootScope.$emit('addFlash', [{
                    type: 'danger',
                    msg: 'You have provided invalid email/matrimony id or password.'
                }]);
            }

            clearCredentials();
            if (angular.isFunction(errorcallback)) {
                errorcallback(resp);
            }
        });
    };

    var logout = function() {
        RESTUtil.post("site/logout").then(function(){
            clearCredentials();
            $state.go("home");
        }, function(){
            clearCredentials();
            $state.go("home");
        });
    };

    var loadUser = function(){
        RESTUtil.post("site/user").then(function(resp){
            if(resp){
                setCredentials(resp);
                var returnObject = $location.search();
                if(returnObject && returnObject.returnTo){
                    $location.path(returnObject.returnTo).search("returnTo", null);
                }else {
                    $state.go('userHome');
                }
            }
        }, function(resp){
            var returnPath = $location.path();
            if(returnPath!="/login") {
                $location.path("/login").search("returnTo", returnPath);
            }
            if(resp.status==403){
                $rootScope.$emit('sessionExpired');
            }
            clearCredentials();
        });
    };

    var setAuthorization = function() {
        if (isAuthorized() && !Global.currentUser) {
            return loadUser();
        }
    };

    $rootScope.$on('sessionExpired', function() {
        clearCredentials();
        $rootScope.$emit('addFlash', [{
            type: 'danger',
            msg: 'Your session has been expired, please login again.'
        }]);
    });
    return {
        login: login,
        logout: logout,
        isAuthorized: isAuthorized,
        setAuthorization: setAuthorization,
        sessionData: Global
    };
};

angular.module("BJMMatrimony").factory("Session", Session);

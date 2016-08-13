var UserFactory = function(RESTUtil){
    var login = function (paramsData) {
        return RESTUtil.post("site/login", paramsData);
    };
    var logout = function () {
        return RESTUtil.post("site/logout");
    };
    var loadUser = function () {
        return RESTUtil.post("site/user");
    };
    var forgotPassword = function (paramsData) {
        return RESTUtil.post("site/forgotPassword", paramsData);
    };
    var resetPassword = function(paramsData){
        return RESTUtil.post("site/resetPassword", paramsData);
    };
    return {
        login: login,
        logout: logout,
        loadUser: loadUser,
        forgotPassword: forgotPassword,
        resetPassword: resetPassword
    };
};
angular.module("BJMMatrimony").factory("UserFactory", UserFactory);

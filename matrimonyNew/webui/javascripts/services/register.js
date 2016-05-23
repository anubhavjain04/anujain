var RegisterFactory = function(RESTUtil){
    var registerMember = function (data) {
        return RESTUtil.post("register/registerMember", data);
    };
    var updateProfile = function (userId, data) {
        return RESTUtil.post("register/updateProfile/id/"+userId, data);
    };
    return {
        registerMember: registerMember,
        updateProfile: updateProfile
    };
};
angular.module("BJMMatrimony").factory("RegisterFactory", RegisterFactory);

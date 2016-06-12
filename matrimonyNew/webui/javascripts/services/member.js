var MemberFactory = function(RESTUtil){
    var getMember = function (id) {
        return RESTUtil.get("matrimonyMembers/view/id/"+id);
    };
    var updateMemberDetails = function(id, data){
        return RESTUtil.post("matrimonyMembers/updateMemberDetails/id/"+id, data);
    };
    var updateFamilyDetails = function(id, data){
        return RESTUtil.post("matrimonyFamilyDetails/updateFamilyDetails/id/"+id, data);
    };
    var uploadProfilePhoto = function (id, data) {
        return RESTUtil.post("matrimonyMembers/changeProfilePic/id/"+id, data);
    };
    var changePassword = function (id, data) {
        return RESTUtil.post("matrimonyUser/changePassword/id/"+id, data);
    };
    var userProfilePic = function (id) {
        return RESTUtil.get("matrimonyMembers/userProfilePic/id/"+id);
    };
    return {
        getMember: getMember,
        updateMemberDetails: updateMemberDetails,
        updateFamilyDetails: updateFamilyDetails,
        uploadProfilePhoto: uploadProfilePhoto,
        changePassword: changePassword,
        userProfilePic: userProfilePic
    };
};
angular.module("BJMMatrimony").factory("MemberFactory", MemberFactory);

var SearchFactory = function(RESTUtil, $serverPath){
    var searchSpecs = {};
    var setSearchSpecs = function(specs){
        searchSpecs = specs;
    };
    var getSearchSpecs = function(){
      return searchSpecs;
    };
    var getSearchResults = function (data) {
        return RESTUtil.post("search/results", data);
    };
    var getDataList = function(){
        return RESTUtil.post("search/dataList");
    };
    var getMember = function(memberId){
        return RESTUtil.get("search/member/id/"+memberId);
    };
    var memberProfilePicPath = function (id) {
        return $serverPath + "search/memberProfilePic/id/"+id;
    };

    return {
        getDataList: getDataList,
        getSearchResults: getSearchResults,
        getMember: getMember,
        setSearchSpecs: setSearchSpecs,
        getSearchSpecs: getSearchSpecs,
        memberProfilePicPath: memberProfilePicPath
    };
};
angular.module("BJMMatrimony").factory("SearchFactory", SearchFactory);

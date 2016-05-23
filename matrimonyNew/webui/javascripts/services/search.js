var SearchFactory = function(RESTUtil){
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

    return {
        getDataList: getDataList,
        getSearchResults: getSearchResults,
        getMember: getMember,
        setSearchSpecs: setSearchSpecs,
        getSearchSpecs: getSearchSpecs
    };
};
angular.module("BJMMatrimony").factory("SearchFactory", SearchFactory);

var SectFactory = function(RESTUtil){
    var getSubSects = function (paramsData) {
        return RESTUtil.post("matrimonySubSect/getSubSects", paramsData);
    };
    return {
        getSubSects: getSubSects
    };
};
angular.module("BJMMatrimony").factory("SectFactory", SectFactory);

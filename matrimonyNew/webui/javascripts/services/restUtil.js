var RESTUtil = function($http, $serverPath, $q, $timeout){
    var call = function(method, url, data, param, header, transformRequest) {
        var deferred = $q.defer();
        var config = {method: method, url: $serverPath + url, data: data, params: param, withCredentials: true, headers: header};
        if(transformRequest) {
            config.transformRequest = transformRequest;
        }
        angular.element("#ajaxLoader").show();
        $http(config)
            .success(function (data, status) {
                deferred.resolve(data, status);
            })
            .error(function (error, status) {
                if (status === 401) {
                    $rootScope.$broadcast('session.expired');
                }
                deferred.reject(error);
            }).finally(function(){
                 angular.element("#ajaxLoader").hide();
            });
        return deferred.promise;
    };

    var getData = function(url, data, param, header) {
        return call('GET', url, data, param, header);
    };

    var postData = function(url, data, param, header, transformRequest) {
        return call('POST', url, data, param, header, transformRequest);
    };

    var deleteData = function(url, data, param, header) {
        return call('DELETE', url, data, param, header);
    };

    var updateData = function(url, data, param, header) {
        return call('PUT', url, data, param, header);
    };

    return {
        get: getData,
        post: postData,
        update: updateData,
        delete: deleteData
    };
};
angular.module("BJMMatrimony").factory("RESTUtil", RESTUtil);

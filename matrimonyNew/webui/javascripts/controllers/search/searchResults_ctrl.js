var SearchResultsCtrl = function($scope, $controller, $state, $stateParams, FacetFactory, SearchFactory, $uibModal) {
    $controller('SearchCtrl', {$scope: $scope});

    var Page = function(pageNo, selected){
        this.pageNo = pageNo;
        this.selected = selected;
    };
    $scope.facetVM = FacetFactory;
    $scope.totalItems = 0;
    $scope.start = 0;
    $scope.end = 0;
    $scope.count = 0;
    $scope.pageSize = 10;
    $scope.pageCount = 0;
    $scope.currentPage = undefined;
    $scope.dataList = [];
    $scope.disablePrevious = true;
    $scope.disableNext = false;
    $scope.pageLinkDisplaySize = 10;
    $scope.pageList = [];

    // Deregister parent watcher
    $scope.deRegisterWatchers();
    // set spec in parent controller
    $scope.setSpecs($stateParams);


    $scope.getSelectedItem = function(item, list, key){
        var selectedItems = list.filter(function(listItem){
            return listItem && listItem[key] == item;
        });
        return selectedItems[0];
    };

    $scope.clearData = function(){
        $scope.totalItems = 0;
        $scope.start = 0;
        $scope.end = 0;
        $scope.count = 0;
        $scope.pageCount = 0;
        $scope.dataList.length = 0;
        $scope.pageList.length = 0;
    };


    $scope.getSearchResults = function(){
        var generatedSpecs = $scope.generateSpecs();
        // set generated specs into search factory
        SearchFactory.setSearchSpecs(generatedSpecs);
        var dataObject = {
            Search: JSON.stringify(generatedSpecs),
            pageSize: $scope.pageSize
        };
        if($scope.currentPage){
            dataObject.page = $scope.currentPage;
        }

        SearchFactory.getSearchResults(dataObject).then(function(data){
            if(data){
                $scope.totalItems = data.total;
                $scope.start = data.start;
                $scope.end = data.end;
                $scope.count = data.count;
                $scope.currentPage = data.currentPage;
                $scope.pageSize = data.pageSize;
                $scope.pageCount = data.pageCount;
                $scope.dataList = data.dataList;
                $scope.setPageList();
            }else{
                $scope.clearData();
                alert("error found in getting results.");
            }
        }, function(error){
            $scope.clearData();
            alert("error found in getting results.");
        });
    };
    $scope.$watch("currentPage", function(newvalue){
        if(!newvalue || newvalue==1){
            $scope.disablePrevious = true;
        }else{
            $scope.disablePrevious = false;
        }
        if(newvalue && newvalue==$scope.pageCount){
            $scope.disableNext = true;
        }else{
            $scope.disableNext = false;
        }
    });

    $scope.goToPage = function(pageNo){
        $scope.currentPage = pageNo;
        $scope.getSearchResults();
    };
    $scope.previousPage = function(){
        if(!$scope.disablePrevious){
            if($scope.currentPage && $scope.currentPage>1){
                $scope.currentPage = $scope.currentPage-1;
            }
            $scope.getSearchResults();
        }
    };
    $scope.nextPage = function(){
        if(!$scope.disableNext){
            if($scope.currentPage && $scope.currentPage<$scope.pageCount){
                $scope.currentPage = $scope.currentPage+1;
            }
            $scope.getSearchResults();
        }
    };

    $scope.setPageList = function(){
        $scope.pageList.length = 0;
        var start = 1;
        var end = start + $scope.pageLinkDisplaySize;
        if($scope.pageCount<$scope.pageLinkDisplaySize){
            end = start + $scope.pageCount;
        }else{
            if(($scope.currentPage-($scope.pageLinkDisplaySize/2))>0){
                start = parseInt($scope.currentPage-($scope.pageLinkDisplaySize/2))+1;
            }
            if(($scope.pageCount-start)<$scope.pageLinkDisplaySize){
                start = $scope.pageCount-$scope.pageLinkDisplaySize+1;
            }
            end = start + $scope.pageLinkDisplaySize;
        }
        for(var i=start; i<end; i++){
            var isSelected = false;
            if(i==$scope.currentPage){
                isSelected = true;
            }
            $scope.pageList.push(new Page(i, isSelected));
        }
    };

    $scope.toggleSelection = function(key, list){
        var idx = list.indexOf(key);
        if(idx > -1){
            list.splice(idx, 1);
        }else{
            list.push(key);
        }
    };

    $scope.viewMember = function(memberId){
        $state.go('searchMember', {memberCode: memberId});
    };

    $scope.getMemberProfilePic = function(id){
        return SearchFactory.memberProfilePicPath(id);
    };

    $scope.getSearchResults();
};
angular.module("BJMMatrimony").controller("SearchResultsCtrl", SearchResultsCtrl);
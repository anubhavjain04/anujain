var SearchMemberCtrl = function($scope, $state, $stateParams, FacetFactory, SearchFactory) {
    $scope.facetVM = FacetFactory;
    var memberCode = $stateParams.memberCode;
    $scope.member = undefined;
    $scope.findOne = function(memberId){
        $scope.isLoaded = false;
        SearchFactory.getMember(memberId).then(function(memberData){
            if(memberData){
                $scope.member = memberData;
            }else{
                $scope.member = undefined;
            }
            $scope.isLoaded = true;
        },function(){
            $scope.member = undefined;
            $scope.isLoaded = true;
        });
    };
    $scope.back = function(){
        $state.go('searchResults', SearchFactory.getSearchSpecs());
    };
    $scope.getMemberProfilePic = function(id){
        return SearchFactory.memberProfilePicPath(id);
    };
    $scope.findOne(memberCode);
};
angular.module("BJMMatrimony").controller("SearchMemberCtrl", SearchMemberCtrl);
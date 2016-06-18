var SearchCtrl = function($scope, $state, $stateParams, Session, FacetFactory, $uibModal) {
    $scope.global = Session.sessionData;
    var user = Session.sessionData.currentUser;
    var femaleAgeStart = 18;
    var maleAgeStart = 21;
    $scope.facetVM = FacetFactory;
    $scope.activeSearchTab = 'regular';
    $scope.sex = (user)?((user.Sex==='1')? "0":"1"):"0";
    $scope.memberCode = null;
    $scope.ageFrom = femaleAgeStart;
    $scope.ageTo = femaleAgeStart+12;
    $scope.heightFrom = "121.92";
    $scope.heightTo = "167.64";
    $scope.selectedMaritalStatus = [];
    $scope.selectedSect = [];
    $scope.selectedSubSect = [];
    $scope.selectedCaste = [];
    $scope.selectedMotherTongue = [];
    $scope.selectedCourseGroup = [];
    $scope.selectedCountry = [];
    $scope.selectedOccupationGroup = [];
    $scope.selectedAnnualIncome = null;
    $scope.selectedPhysicalStatus = [];
    $scope.selectedEmployedIn = [];

    $scope.changeAgeCriteria = $scope.$watch('sex', function(newvalue){
        if(angular.isDefined(newvalue)){
            var ageStart = ($scope.sex=="0")?femaleAgeStart:maleAgeStart;
            $scope.ageFrom = ageStart;
            $scope.ageTo = ageStart+12;
        }
    });

    //$scope.changeSex = function(){
    //
    //};

    $scope.showSearchResults = false;

    $scope.searchMember = function(){
        if($scope.memberCode){
            $state.go("searchMember", {memberCode: $scope.memberCode});
        }
    };

    $scope.generateSpecs = function(){
        var specs = {};
        specs.sex = $scope.sex;
        specs.ageFrom = $scope.ageFrom;
        specs.ageTo = $scope.ageTo;
        specs.heightFrom = $scope.heightFrom;
        specs.heightTo = $scope.heightTo;
        specs.maritalStatus = $scope.selectedMaritalStatus;
        specs.sect = $scope.selectedSect;
        specs.subsect = $scope.selectedSubSect;
        specs.caste = $scope.selectedCaste;
        specs.mothertongue = $scope.selectedMotherTongue;
        specs.educationGroup = $scope.selectedCourseGroup;
        specs.occupationGroup = $scope.selectedOccupationGroup;
        if($scope.selectedAnnualIncome){
            specs.annualIncomeFrom = $scope.selectedAnnualIncome.from;
            specs.annualIncomeTo = $scope.selectedAnnualIncome.to;
        }
        specs.physicalStatus = $scope.selectedPhysicalStatus;
        specs.employedIn = $scope.selectedEmployedIn;
        specs.country = $scope.selectedCountry;
        return specs;
    };

    $scope.setSpecs = function(queryJSON){
        if(queryJSON){
            if(queryJSON.sex)
                $scope.sex = queryJSON.sex;
            if(queryJSON.ageFrom)
                $scope.ageFrom = queryJSON.ageFrom;
            if(queryJSON.ageTo)
                $scope.ageTo = queryJSON.ageTo;
            if(queryJSON.heightFrom)
                $scope.heightFrom = queryJSON.heightFrom;
            if(queryJSON.heightTo)
                $scope.heightTo = queryJSON.heightTo;
            if(queryJSON.maritalStatus && queryJSON.maritalStatus.length>0){
                $scope.resetSelectedItems($scope.selectedMaritalStatus, queryJSON.maritalStatus);
            }
            if(queryJSON.sect && queryJSON.sect.length>0){
                $scope.resetSelectedItems($scope.selectedSect, queryJSON.sect);
                $scope.facetVM.afterSectChange($scope.selectedSect);
            }
            if(queryJSON.subsect && queryJSON.subsect.length>0){
                $scope.resetSelectedItems($scope.selectedSubSect, queryJSON.subsect);
            }
            if(queryJSON.caste && queryJSON.caste.length>0){
                $scope.resetSelectedItems($scope.selectedCaste, queryJSON.caste);
            }
            if(queryJSON.mothertongue && queryJSON.mothertongue.length>0){
                $scope.resetSelectedItems($scope.selectedMotherTongue, queryJSON.mothertongue);
            }
            if(queryJSON.educationGroup && queryJSON.educationGroup.length>0){
                $scope.resetSelectedItems($scope.selectedCourseGroup, queryJSON.educationGroup);
            }
            if(queryJSON.occupationGroup && queryJSON.occupationGroup.length>0){
                $scope.resetSelectedItems($scope.selectedOccupationGroup, queryJSON.occupationGroup);
            }
            if(queryJSON.annualIncomeFrom && queryJSON.annualIncomeTo){
                $scope.selectedAnnualIncome = $scope.facetVM.findAnnualIncome(queryJSON.annualIncomeFrom, queryJSON.annualIncomeTo);
            }
            if(queryJSON.physicalStatus && queryJSON.physicalStatus.length>0 ){
                $scope.resetSelectedItems($scope.selectedPhysicalStatus, queryJSON.physicalStatus);
            }
            if(queryJSON.employedIn && queryJSON.employedIn.length>0){
                $scope.resetSelectedItems($scope.selectedEmployedIn, queryJSON.employedIn);
            }
            if(queryJSON.country && queryJSON.country.length>0){
                $scope.resetSelectedItems($scope.selectedCountry, queryJSON.country);
            }
        }
    };

    $scope.resetSelectedItems = function(itemObject, newItems){
        itemObject.length = 0;
        if(angular.isArray(newItems)) {
            angular.merge(itemObject, newItems);
        }else{
            itemObject.push(newItems);
        }
    };

    $scope.deRegisterWatchers = function(){
        $scope.changeAgeCriteria();
    };

    $scope.searchByCriteria = function(){
        $state.go("searchResults", $scope.generateSpecs());
    };

    var modalInstance = undefined;
    $scope.openModal = function(template){
        modalInstance = $uibModal.open({
            templateUrl: template,
            scope: $scope
        });
    };

    $scope.search = function(){
        $scope.searchByCriteria();
        if(modalInstance) {
            modalInstance.close();
            modalInstance = undefined;
        }
    };

    $scope.closeModal = function(){
        if(modalInstance) {
            modalInstance.dismiss('cancel');
            modalInstance = undefined;
        }
    };


};
angular.module("BJMMatrimony").controller("SearchCtrl", SearchCtrl);
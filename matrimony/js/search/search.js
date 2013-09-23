define(function (require) {    
	var ko               = require('knockout');
	var $                = require('jquery');
	var ajaxutil		 = require('ajaxutil');
	var SearchResults	 = require('search/searchResults');		

	return function(){ 
		var self = this;
		self.searchViewModel = function(mainVM) {
			var vm = this;
			vm.mainVM = mainVM;
			vm.searchResults = new SearchResults();
			vm.activeSearchTab = ko.observable('regular');
			
			vm.sex = vm.mainVM.facetVM.sex;
			vm.memberCode = vm.mainVM.facetVM.memberCode;
			vm.ageList = vm.mainVM.facetVM.ageList;
			vm.ageFrom = ko.observable();
			vm.ageTo = ko.observable();	
			vm.heightFrom = ko.observable(121.92);
			vm.heightTo = ko.observable(167.64);
			vm.heightList = vm.mainVM.facetVM.heightList;
			
			vm.maritalStatusList = vm.mainVM.facetVM.maritalStatusList;
			vm.selectedMaritalStatus = ko.observableArray();
			
			vm.sectList = vm.mainVM.facetVM.sectList;
			vm.selectedSect = ko.observableArray();
			
			vm.subSectList = vm.mainVM.facetVM.subSectList;
			vm.selectedSubSect = ko.observableArray();
			
			vm.casteList = vm.mainVM.facetVM.casteList;
			vm.selectedCaste = ko.observableArray();
			
			vm.motherTongueList = vm.mainVM.facetVM.motherTongueList;
			vm.selectedMotherTongue = ko.observableArray();
			
			vm.courseGroupList = vm.mainVM.facetVM.courseGroupList;
			vm.selectedCourseGroup = ko.observableArray();
			
			vm.countryList = vm.mainVM.facetVM.countryList;
			vm.selectedCountry = ko.observableArray();
			
			vm.occupationGroupList = vm.mainVM.facetVM.occupationGroupList;
			vm.selectedOccupationGroup = ko.observableArray();
			
			vm.annualIncomeList = vm.mainVM.facetVM.annualIncomeList;
			vm.selectedAnnualIncome = ko.observable();
			
			vm.physicalStatusList =  vm.mainVM.facetVM.physicalStatusList;
			vm.selectedPhysicalStatus = ko.observableArray();
			
			vm.employedInList = vm.mainVM.facetVM.employedInList;
			vm.selectedEmployedIn = ko.observableArray();
			
			vm.manglikList =  vm.mainVM.facetVM.manglikList;
			vm.bodyTypeList =  vm.mainVM.facetVM.bodyTypeList;
			vm.complexionList =  vm.mainVM.facetVM.complexionList;
			vm.registeredByList = vm.mainVM.facetVM.registeredByList;
			
			vm.changeAgeCriteria = ko.computed(function(){
				var ageStart = (vm.sex()==0)?18:21;
				vm.ageFrom(ageStart);
				vm.ageTo(ageStart+12);
			}, vm);
		
			vm.showSearchResults = ko.observable(false);
			
			vm.searchMember = function(){
				if(vm.memberCode()){
					vm.mainVM.route.searchMember(vm.memberCode());
				}
			};
			
			vm.generateSpecs = function(){
				var specs = {};
				specs.sex = vm.sex();
				specs.ageFrom = vm.ageFrom();
				specs.ageTo = vm.ageTo();
				specs.heightFrom = vm.heightFrom();
				specs.heightTo = vm.heightTo();
				specs.maritalStatus = vm.selectedMaritalStatus();
				specs.sect = vm.selectedSect();
				specs.subsect = vm.selectedSubSect();
				specs.caste = vm.selectedCaste();
				specs.mothertongue = vm.selectedMotherTongue();
				specs.educationGroup = vm.selectedCourseGroup();
				specs.occupationGroup = vm.selectedOccupationGroup();
				if(vm.selectedAnnualIncome()){
					specs.annualIncomeFrom = vm.selectedAnnualIncome().from;
					specs.annualIncomeTo = vm.selectedAnnualIncome().to;
				}
				specs.physicalStatus = vm.selectedPhysicalStatus();
				specs.employedIn = vm.selectedEmployedIn();
				specs.country = vm.selectedCountry();
				return specs;
			};
			
			vm.searchByCriteria = function(){
				vm.mainVM.route.searchRecords(vm.generateSpecs());
			};				
			
			// fill sub sect after sect change
			vm.afterSectChange = vm.mainVM.facetVM.afterSectChange;
			
			vm.searchResultsVM = new vm.searchResults.searchResultsViewModel(vm);			
		};
	};
});
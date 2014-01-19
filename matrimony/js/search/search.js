define(function (require) {    
	var ko               = require('knockout');
	var ajaxutil		 = require('ajaxutil');
	var SearchResults	 = require('search/searchResults');	
	var Label   		 = require('label');

	return function(){ 
		var self = this;
		self.searchViewModel = function(searchMainVM) {
			var vm = this;
			vm.searchMainVM = searchMainVM;
			vm.activeSearchTab = ko.observable('regular');
			
			vm.sex = ko.observable("0");
			vm.memberCode = ko.observable();
			vm.ageFrom = ko.observable();
			vm.ageTo = ko.observable();	
			vm.heightFrom = ko.observable(121.92);
			vm.heightTo = ko.observable(167.64);
			vm.selectedMaritalStatus = ko.observableArray();
			vm.selectedSect = ko.observableArray();
			vm.selectedSubSect = ko.observableArray();
			vm.selectedCaste = ko.observableArray();
			vm.selectedMotherTongue = ko.observableArray();
			vm.selectedCourseGroup = ko.observableArray();
			vm.selectedCountry = ko.observableArray();
			vm.selectedOccupationGroup = ko.observableArray();
			vm.selectedAnnualIncome = ko.observable();
			vm.selectedPhysicalStatus = ko.observableArray();
			vm.selectedEmployedIn = ko.observableArray();
			
			vm.changeAgeCriteria = ko.computed(function(){
				var ageStart = (vm.sex()==0)?18:21;
				vm.ageFrom(ageStart);
				vm.ageTo(ageStart+12);
			}, vm);
		
			vm.showSearchResults = ko.observable(false);
			
			vm.searchMember = function(){
				if(vm.memberCode()){
					jHash.set(Label.SEARCH_PAGE+'/member/'+vm.memberCode(), {});
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
			
			vm.setSpecs = function(queryJSON){
				if(queryJSON){
					if(queryJSON.sex)
						vm.sex(parseInt(queryJSON.sex));
					if(queryJSON.agefrom)
						vm.ageFrom(parseInt(queryJSON.agefrom));
					if(queryJSON.ageto)
						vm.ageTo(parseInt(queryJSON.ageto));
					if(queryJSON.heightfrom)
						vm.heightFrom(parseFloat(queryJSON.heightfrom));
					if(queryJSON.heightto)
						vm.heightTo(parseFloat(queryJSON.heightto));
					if(queryJSON.maritalstatus){
						vm.resetSelectedItems(vm.selectedMaritalStatus, queryJSON.maritalstatus);
					}
					if(queryJSON.sect){
						vm.resetSelectedItems(vm.selectedSect, queryJSON.sect);
						vm.searchMainVM.root().facetVM.afterSectChange(vm.selectedSect());
					}
					if(queryJSON.subsect){
						vm.resetSelectedItems(vm.selectedSubSect, queryJSON.subsect);
					}
					if(queryJSON.caste){
						vm.resetSelectedItems(vm.selectedCaste, queryJSON.caste);
					}
					if(queryJSON.mothertongue){
						vm.resetSelectedItems(vm.selectedMotherTongue, queryJSON.mothertongue);
					}
					if(queryJSON.educationgroup){
						vm.resetSelectedItems(vm.selectedCourseGroup, queryJSON.educationgroup);
					}
					if(queryJSON.occupationgroup){
						vm.resetSelectedItems(vm.selectedOccupationGroup, queryJSON.occupationgroup);
					}
					if(queryJSON.annualincomefrom && queryJSON.annualincometo){
						vm.selectedAnnualIncome(vm.searchMainVM.root().facetVM.findAnnualIncome(queryJSON.annualincomefrom, queryJSON.annualincometo));
					}
					if(queryJSON.physicalstatus){
						vm.resetSelectedItems(vm.selectedPhysicalStatus, queryJSON.physicalstatus);
					}
					if(queryJSON.employedin){
						vm.resetSelectedItems(vm.selectedEmployedIn, queryJSON.employedin);
					}				
					if(queryJSON.country){
						vm.resetSelectedItems(vm.selectedCountry, queryJSON.country);
					}
				}
				// get results
				vm.searchResultsVM.showSearchResults(vm.generateSpecs());
			};
			
			vm.resetSelectedItems = function(itemObject, newItems){
				itemObject.removeAll();
				var itemArray = newItems.split(",");
				if(itemArray){
					ko.utils.arrayForEach(itemArray, function(item){
						if(item)
							itemObject.push(item);
					});
				}
			};
			
			vm.searchByCriteria = function(){
				jHash.set(Label.SEARCH_PAGE+'/results', vm.generateSpecs());
			};				
			
			vm.searchResults = new SearchResults();
			vm.searchResultsVM = new vm.searchResults.searchResultsViewModel(vm.searchMainVM);			
		};
	};
});
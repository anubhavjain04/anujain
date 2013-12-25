define(function (require) {    
	var ko               = require('knockout');
	var $                = require('jquery');
	var Search	 		 = require('search/search');
	var SearchMember	 = require('search/searchMember');

	return function(){ 
		var self = this;
		self.searchMainViewModel = function() {
			var vm = this;
			vm.root = ko.observable().subscribeTo("requestRootObject", true);
			vm.showPage = ko.observable("search-page");
			vm.categorySwitch = ko.observable().publishOn("requestCategorySwitch", true);
			
			vm.searchPage = function(searchCriteria){
				if(searchCriteria && searchCriteria.type){
					vm.searchVM.activeSearchTab(searchCriteria.type);
				}
				vm.showPage('search-page');
			};
			vm.showResults = function(searchCriteria){
				vm.searchVM.setSpecs(searchCriteria);
			};
			vm.showMember = function(memberId){
				if(memberId){
					vm.searchMemberVM.showMemberPage(memberId);
				}
			};
			
			vm.switchToMemberPage = function(){
				vm.showPage('search-member-page');
				vm.categorySwitch(vm.root().label.SEARCH_PAGE);
			};
			
			//Object creation
			vm.search = new Search();
			vm.searchVM = new vm.search.searchViewModel(vm);
			
			vm.searchMember = new SearchMember();
			vm.searchMemberVM = new vm.searchMember.searchMemberViewModel(vm);
		};
	};
});
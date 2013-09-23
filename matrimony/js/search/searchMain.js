define(function (require) {    
	var ko               = require('knockout');
	var $                = require('jquery');
	var Search	 		 = require('search/search');
	var Member			 = require('search/member');
	var Route	 		 = require('search/route');	

	return function(){ 
		var self = this;
		self.searchMainViewModel = function(root) {
			var vm = this;
			vm.root = root;
			vm.facetVM = vm.root.facetVM;
			vm.showPage = ko.observable("search-page");
			
			vm.searchPage = function(searchCriteria){
				if(searchCriteria && searchCriteria.type){
					vm.searchVM.activeSearchTab(searchCriteria.type);
				}
				vm.showPage('search-page');
			};
			vm.showResults = function(searchCriteria){
				vm.route.setSpecs(searchCriteria);
			};
			vm.showMember = function(memberId){
				if(memberId){
					vm.memberVM.showMemberPage(memberId);
					vm.showPage('search-member-page');
				}
			};
			
			//Object creation
			vm.search = new Search();
			vm.searchVM = new vm.search.searchViewModel(vm);
			
			vm.member = new Member();
			vm.memberVM = new vm.member.memberViewModel(vm);
			
			vm.route = new Route(vm);
		};
	};
});
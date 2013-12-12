define(function (require) {    
	var ko               = require('knockout');
	var $                = require('jquery');
	var Registration	 = require('register/registration');
	var Route	 		 = require('register/route');	

	return function(){ 
		var self = this;
		self.registerMainViewModel = function(root) {
			var vm = this;
			vm.root = root;
			vm.facetVM = vm.root.facetVM;
			
			vm.showPage = ko.observable("register-member");
			
			/*vm.searchPage = function(searchCriteria){
				if(searchCriteria && searchCriteria.type){
					vm.searchVM.activeSearchTab(searchCriteria.type);
				}
				vm.showPage('search-page');
			};
			//Object creation
			vm.search = new Search();
			vm.searchVM = new vm.search.searchViewModel(vm);*/
			
			//Object creation
			vm.registration = new Registration();
			vm.registrationVM = new vm.registration.registrationViewModel(vm);
			
			vm.clearRegistration = function(){
				vm.registrationVM.clear();
			};
			
			
			vm.route = new Route(vm);
		};
	};
});
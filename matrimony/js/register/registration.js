define(function (require) {    
	var ko               = require('knockout');
	var $                = require('jquery');
	var Route	 		 = require('register/route');	

	return function(){ 
		var self = this;
		self.registrationViewModel = function(mainVM) {
			var vm = this;
			vm.mainVM = mainVM;
			vm.facetVM = vm.mainVM.facetVM;
			
			vm.dob = ko.observable(new Date());
			
			
			
			
		};
	};
});
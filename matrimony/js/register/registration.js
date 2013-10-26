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
			vm.sex = ko.observable(0);
			vm.registeredBy = ko.observable().extend({
				required: true
			});
			vm.memberName = ko.observable().extend({
				required: true
			});
			vm.dob = ko.observable().extend({
				required: true
			});
			vm.maritalStatus = ko.observable().extend({
				required: true
			});
			vm.sect = ko.observable().extend({
				required: true
			});
			vm.subSect = ko.observable().extend({
				required: true
			});
			vm.caste = ko.observable();
			vm.motherTongue = ko.observable().extend({
				required: true
			});
			vm.country = ko.observable().extend({
				required: true
			});
			vm.state = ko.observable().extend({
				required: true
			});
			vm.city = ko.observable().extend({
				required: true
			});
			vm.contactNumber = ko.observable().extend({
				required: true
			});
			vm.emailId = ko.observable().extend({
				required: true
			});
			vm.password = ko.observable().extend({
				required: true
			});
			vm.confirmPassword = ko.observable().extend({
				required: true,
				validation: {
	                  validator: function(val, otherValue){
	                      return val === vm.password();
	                  },
	                  message: "Password and confirm passsword does not match."
	              }
			});
			
			vm.registerUser = function(){				
				alert("register");
				alert(vm.isFormValid());
			};
			
			// Checks whether the form is valid or not
			vm.isFormValid = function(){
				if(vm.errors().length !== 0){
					// Show errors
					vm.errors.showAllMessages();
					return false;
				}
				return true;
			};
			vm.errors = ko.validation.group(vm);
		};
	};
});
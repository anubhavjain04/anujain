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
			vm.termsConditions = ko.observable(false);
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
			vm.country = ko.observable();
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
				if(vm.isFormValid() && vm.termsConditions()){
					
				}
			};
			
			vm.clear = function(){
				vm.registeredBy(undefined);
				vm.memberName(undefined);
				vm.dob(undefined);
				vm.maritalStatus(undefined);
				vm.sect(undefined);
				vm.subSect(undefined);
				vm.caste(undefined);
				vm.motherTongue(undefined);
				vm.country(undefined);
				vm.state(undefined);
				vm.city(undefined);
				vm.contactNumber(undefined);
				vm.emailId(undefined);
				vm.password(undefined);
				vm.confirmPassword(undefined);
				vm.termsConditions(false);
				vm.clearValidation();
			};
			
			vm.clearValidation = function(){
				vm.registeredBy.isModified(false);
				vm.memberName.isModified(false);
				vm.dob.isModified(false);
				vm.maritalStatus.isModified(false);
				vm.sect.isModified(false);
				vm.subSect.isModified(false);
				vm.motherTongue.isModified(false);
				vm.state.isModified(false);
				vm.city.isModified(false);
				vm.contactNumber.isModified(false);
				vm.emailId.isModified(false);
				vm.password.isModified(false);
				vm.confirmPassword.isModified(false);
			};
			
			// Checks whether the form is valid or not
			vm.isFormValid = function(){
				if(vm.errors().length > 0){
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
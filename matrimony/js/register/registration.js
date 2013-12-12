define(function (require) {    
	var ko               = require('knockout');
	var $                = require('jquery');
	var ajaxutil		 = require('ajaxutil');
	var Route	 		 = require('register/route');	

	return function(){ 
		var self = this;
		self.registrationViewModel = function(mainVM) {
			var vm = this;
			vm.mainVM = mainVM;
			vm.facetVM = vm.mainVM.facetVM;
			vm.user = ko.observable().publishOn("loggedInUser", true);
			vm.message = ko.observable();
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
				required: true,
                pattern: {
                     message: 'This field required a number',
                     params: /^(\d{10}(,([\s]*)?\d{10})*)?$/
                }
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
			
			vm.isFocusEmail = ko.observable(false);
			
			vm.registerUser = function(){				
				if(vm.isFormValid() && vm.termsConditions()){
					var dob = '';
					if(vm.dob()){
						dob = (vm.dob().getUTCMonth()+1) + '/'+vm.dob().getUTCDate()+'/'+vm.dob().getUTCFullYear()+' '+vm.dob().getUTCHours()+':'+vm.dob().getUTCMinutes();
					}
					var formData = {
						registerBy 	: vm.registeredBy(),
						memberName 	: vm.memberName(),
						sex 		: vm.sex(),
						dob 		: dob,
						maritalStatus:vm.maritalStatus(),
						sect		: vm.sect(),
						subSect		: vm.subSect(),
						motherTongue: vm.motherTongue(),
						contactNumber: vm.contactNumber(),
						country		: vm.country(),
						state		: vm.state(),
						city		: vm.city(),
						emailId		: vm.emailId(),
						password	: vm.password()
					};					
					var path = "register/registerMember";
					ajaxutil.put(path, formData, function(data){
						if(data){
							vm.user(data);
							console.log(data);
						}
					},function(error){
						if(error && error.status === 302){
							vm.isFocusEmail(true);
							vm.message(error.responseText);
							vm.hideMessage();							
						}else{
							console.log(error);
						}
					});
					
				}
			};
			
			vm.clear = function(){
				vm.sex(0);
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
				vm.message(undefined);
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
			
			vm.hideMessage = function(){
				setTimeout(function(){
					vm.message(undefined);
				}, 3000);				
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
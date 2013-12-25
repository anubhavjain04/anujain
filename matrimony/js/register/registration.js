define(function (require) {    
	var ko               = require('knockout');
	var ajaxutil		 = require('ajaxutil');
	var MemberProfile	 = require('register/memberProfile');
	var PasswordScore = require('passwordScore');
	var Label   		 = require('label');

	return function(){ 
		var self = this;
		self.passwordScore = new PasswordScore();
		self.registrationViewModel = function(registerMain) {
			var vm = this;
			vm.registerMain = registerMain;
			vm.user = ko.observable().syncWith("loggedInUser", true);
			vm.disableButton = ko.observable(false);
			vm.message = ko.observable();
			vm.termsConditions = ko.observable(false);
			vm.sex = ko.observable(0);
			vm.registeredBy = ko.observable().extend({
				required: true
			});
			vm.memberName = ko.observable().extend({
				required: true
			});
			/*vm.dob = ko.observable().extend({
				required: true
			});*/
			vm.date = ko.observable().extend({
				required: true
			});
			vm.month = ko.observable().extend({
				required: true
			});
			vm.year = ko.observable().extend({
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
				required: true,
				minLength: 8
			});
			vm.confirmPassword = ko.observable().extend({
				required: true,
				minLength: 8,
				validation: {
	                  validator: function(val, otherValue){
	                      return val === vm.password();
	                  },
	                  message: "Password and confirm passsword does not match."
	              }
			});
			
			vm.isFocusEmail = ko.observable(false);
			
			/**
		   * Computed Observables
		   */
			vm.passwordStrength = ko.computed(function() {
				if(!vm.password() || vm.password().length <= 0) return 0;
				return Math.round(self.passwordScore.checkPassword(vm.password()) / 100 * 100);
			});
		 
			vm.passwordColor = ko.computed(function(){
				var str = vm.passwordStrength();
				if(str == 0) return "black";
				if(str > 80) return "green";
				if(str > 50) return "#B0C705";
				if(str > 25) return "#FFC23F";
				return "red";
			});
			
			/*vm.showRecaptcha = function() {
	            Recaptcha.create("6Lepn9sSAAAAAEM0srD2FE9Tko1JoAZ-LqRyy3rP", 'captchadiv', {
	                tabindex: 1,
	                theme: "red",
	                callback: Recaptcha.focus_response_field
	            });
	        };*/
			
			vm.registerUser = function(){
				if(vm.isFormValid() && vm.termsConditions()){
					var recaptchaValue = $("#recaptcha_response_field").val();
					var recaptchaChallenge = $("#recaptcha_challenge_field").val();
										
					vm.disableButton(true);
					var dob = '';
					if(vm.date() && vm.month() && vm.year()){
						dob = vm.month() + '/'+vm.date()+'/'+vm.year();
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
						,
						recaptchaChallenge : recaptchaChallenge,
						recaptchaValue: recaptchaValue
					};					
					var path = "register/registerMember";
					ajaxutil.put(path, formData, function(data){
						if(data){
							vm.user(data);							
							jHash.set(Label.REGISTER_PAGE+"/fill-profile", {});
						}
						vm.disableButton(false);
					},function(error){
						if(error && error.status === 302){
							vm.isFocusEmail(true);
							vm.message(error.responseText);
							vm.hideMessage();							
						}else{
							console.log(error);
						}
						vm.disableButton(false);
					});
					
				}
			};
			
			vm.clear = function(){
				vm.sex(0);
				vm.registeredBy(undefined);
				vm.memberName(undefined);
				//vm.dob(undefined);
				vm.date(undefined);
				vm.month(undefined);
				vm.year(undefined);
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
				vm.disableButton(false);
				vm.clearValidation();
				vm.memberProfile.clear();
			};
			
			vm.clearValidation = function(){
				vm.registeredBy.isModified(false);
				vm.memberName.isModified(false);
				//vm.dob.isModified(false);
				vm.date.isModified(false);
				vm.month.isModified(false);
				vm.year.isModified(false);
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
			
			vm.memberProfile = new MemberProfile(vm);
		};
	};
});
define(function (require) {    
	var ko               = require('knockout');
	var ajaxutil		 = require('ajaxutil');
	var PasswordScore = require('passwordScore');
	var Label   		 = require('label');

	return function(){ 
		var self = this;
		self.user = ko.observable().subscribeTo("loggedInUser", true);
		self.passwordScore = new PasswordScore();
		self.oldPassword = ko.observable().extend({
			required: true,
			minLength: 8
		});
		self.newPassword = ko.observable().extend({
			required: true,
			minLength: 8
		});
		self.confirmPassword = ko.observable().extend({
			required: true,
			minLength: 8,
			validation: {
                  validator: function(val, otherValue){
                      return val === self.newPassword();
                  },
                  message: "Password and confirm passsword does not match."
              }
		});
		self.message = ko.observable();
		
		self.clear = function(){
			self.oldPassword(undefined);
			self.newPassword(undefined);
			self.confirmPassword(undefined);
			self.message(undefined);
			self.clearValidation();
		};
		self.clearValidation = function(){
			self.oldPassword.isModified(false);
			self.newPassword.isModified(false);
			self.confirmPassword.isModified(false);
		};
		
		self.change = function(){
			if(self.user() && self.isFormValid()){
				var formData = {
					oldPassword 	: self.oldPassword(),
					newPassword 	: self.newPassword()
				};
				var url = "matrimonyUser/changePassword/id/"+self.user().id;
				ajaxutil.put(url, formData, function(data){
					if(data){
						if(data.status == 'success'){
							alert("Your password has been changed successfully.");
							jHash.set(Label.HOME_PAGE, {});
							self.clear();
						}else{
							alert("error in change password");
						}
					}
				},function(error){
					self.message(error.responseText);
					self.hideMessage();
					console.log(error);
				});
			}
		};
		
		self.passwordStrength = ko.computed(function() {
			if(!self.newPassword() || self.newPassword().length <= 0) return 0;
			return Math.round(self.passwordScore.checkPassword(self.newPassword()) / 100 * 100);
		});
	 
		self.passwordColor = ko.computed(function(){
			var str = self.passwordStrength();
			if(str == 0) return "black";
			if(str > 80) return "green";
			if(str > 50) return "#B0C705";
			if(str > 25) return "#FFC23F";
			return "red";
		});
		
		self.hideMessage = function(){
			setTimeout(function(){
				self.message(undefined);
			}, 3000);				
		};
		
		// Checks whether the form is valid or not
		self.isFormValid = function(){
			if(self.errors().length > 0){
				// Show errors
				self.errors.showAllMessages();
				return false;
			}
			return true;
		};
		self.errors = ko.validation.group(self);
	};
});
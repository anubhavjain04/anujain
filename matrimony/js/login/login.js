define(function (require) {    
	var ko               = require('knockout');
	var $                = require('jquery');
	var ajaxutil		 = require('ajaxutil');
	var Label   		 = require('label');

	return function(){ 
		var self = this;
		self.loginViewModel = function() {
			var vm = this;
			vm.user = ko.observable().syncWith("loggedInUser", true);
			vm.categorySwitch = ko.observable().subscribeTo("requestCategorySwitch", true);
			
			vm.emailid = ko.observable();
			vm.password = ko.observable();
			vm.message = ko.observable();
			
			vm.user.subscribe(function(usr){
				if(usr){
					if(vm.categorySwitch()==Label.REGISTER_PAGE){
						jHash.set(Label.HOME_PAGE, {});
					}
				}
			});
			
			vm.clear = function(){
				vm.user(undefined);
				vm.emailid(undefined);
				vm.password(undefined);
				vm.message(undefined);
			};
			
			vm.login = function(form){
				var data = ajaxutil.post("site/login", $(form).serialize());
				if(data.status === 200){
					vm.emailid(undefined);
					vm.password(undefined);
					var user = $.parseJSON(data.responseText);
					vm.user(user);
					if(vm.categorySwitch()==Label.LOGIN){
						jHash.set(Label.HOME_PAGE, {});
					}else if(vm.categorySwitch()==Label.HOME_PAGE){
						
					}
				}else{
					vm.user(undefined);
					vm.message("Your BJM-ID/email-ID and password did not match.")
					jHash.set(Label.LOGIN, {});
					vm.hideMessage();
				}				
			};
			
			vm.logout = function(){
				var data = ajaxutil.post("site/logout");
				if(data.status === 200){
					vm.clear();	
					jHash.set(Label.HOME_PAGE, {});
				}
				
			};
			
			vm.hideMessage = function(){
				setTimeout(function(){
					vm.message(undefined);
				}, 3000);				
			};
			
			vm.checkUserStatus = function(){
				ajaxutil.syncFindAll("site/user", function(data){
					if(data && !data.isGuest){
						vm.user(data);						
					}else{
						vm.user(undefined);
					}			
				}, function(data){
					console.log("Guest User");
				});
			};
			
			vm.init = function(){
				vm.checkUserStatus();
			};
		};
	};
});
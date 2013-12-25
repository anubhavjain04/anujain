define(function (require) {    
	var ko               = require('knockout');
	var Registration	 = require('register/registration');
	var Label       = require('label');
	return function(){ 
		var self = this;
		self.registerMainViewModel = function() {
			var vm = this;			
			vm.user = ko.observable().syncWith("loggedInUser", true);
			vm.showPage = ko.observable("register-member");
			vm.showRegisterationPage = function(){
				vm.registrationVM.clear();
				vm.showPage('register-member');
			};
			vm.showRegisterProfilePage = function(){
				if(vm.user()){
					vm.showPage('member-profile');
				}else{
					jHash.set(Label.REGISTER_PAGE, {});
				}
			};
			//Object creation
			vm.registration = new Registration();
			vm.registrationVM = new vm.registration.registrationViewModel(vm);
		};
	};
});
define(function (require) {    
	var ko               = require('knockout');
	var Member	 = require('member/member');
	var ChangePassword	 = require('member/changePassword');

	return function(){ 
		var self = this;
		self.memberMainViewModel = function() {
			var vm = this;			
			vm.showPage = ko.observable("my-matrimony");
			vm.clearMember = function(){
				vm.memberVM.clear();
			};
			
			vm.loadMember = function(){				
				vm.clearMember();
				vm.memberVM.initializeMember();
				vm.showPage('my-matrimony');
			};
			
			vm.showChangePassword = function(){
				vm.changePassword.clear();
				vm.showPage('change-password');
			};
			vm.showMemberProfile = function(profileType){
				vm.memberVM.isEditMode(false);
				vm.memberVM.showProfileType(profileType);
				vm.showPage('member-profile');
				
			};
			
			//Object creation
			vm.member = new Member();
			vm.memberVM = new vm.member.memberViewModel(vm);
			
			vm.changePassword = new ChangePassword();
		};
	};
});
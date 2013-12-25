define(function (require) {    
	var ko               = require('knockout');
	var Member	 = require('member/member');

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
			};
			//Object creation
			vm.member = new Member();
			vm.memberVM = new vm.member.memberViewModel(vm);
		};
	};
});
define(function (require) {
	var ko = require('knockout');
	var Label = require('label');
	return function(root){ 
		var self = this;
		self.root = root;
		self.categorySwitch = ko.observable().publishOn("requestCategorySwitch", true);
		self.user = ko.observable().subscribeTo("loggedInUser", true);
		
		self.action = {
			// search page
			criteria : self.root.searchMainVM.searchPage,
			results : self.root.searchMainVM.showResults,
			memberId : self.root.searchMainVM.showMember,
			showRegisterationPage : self.root.registerMainVM.showRegisterationPage,
			showRegisterProfilePage : self.root.registerMainVM.showRegisterProfilePage,
			initMemberData : self.root.memberMainVM.loadMember,
			showChangePassword : self.root.memberMainVM.showChangePassword,
			showMemberProfile : self.root.memberMainVM.showMemberProfile
		};
		
		jHash.route(Label.HOME_PAGE, function () {
			self.action.showRegisterationPage();
			if(self.user()){
				self.action.initMemberData();
			}
			self.categorySwitch(Label.HOME_PAGE);
		});
		jHash.route(Label.REGISTER_PAGE, function () {
			self.action.showRegisterationPage();
			self.categorySwitch(Label.REGISTER_PAGE);
		});
		jHash.route(Label.REGISTER_PAGE+"/fill-profile", function () {
			self.action.showRegisterProfilePage();
			self.categorySwitch(Label.REGISTER_PAGE);
		});
		jHash.route(Label.MEMBER+"/change-password", function () {
			self.action.showChangePassword();
			self.categorySwitch(Label.MEMBER);
		});
		jHash.route(Label.MEMBER+"/member-profile", function () {
			self.action.showMemberProfile('basic-details');
			self.categorySwitch(Label.MEMBER);
		});
		jHash.route(Label.MEMBER+"/member-profile/{section}", function () {
			if(this.section){
				self.action.showMemberProfile(this.section);
				self.categorySwitch(Label.MEMBER);	
			}
			
		});
		jHash.route(Label.UPGRADE_PAGE, function () {
			self.categorySwitch(Label.UPGRADE_PAGE);
		});
		jHash.route(Label.ABOUTUS_PAGE, function () {
			self.categorySwitch(Label.ABOUTUS_PAGE);
		});
		jHash.route(Label.PRIVACY_POLICY, function () {
			self.categorySwitch(Label.PRIVACY_POLICY);
		});
		jHash.route(Label.TERMS_N_CONDITIONS, function () {
			self.categorySwitch(Label.TERMS_N_CONDITIONS);
		});
		jHash.route(Label.CONTACT_US, function () {
			self.categorySwitch(Label.CONTACT_US);
		});
		jHash.route(Label.LOGIN, function () {
			if(self.user()){
				jHash.set(Label.HOME_PAGE, {});
				window.location.reload();
			}else{
				self.categorySwitch(Label.LOGIN);
			}
		});
		
		jHash.route(Label.SEARCH_PAGE+"/{action}", function () {
			if(this.action && self.action[this.action]){
				if(typeof self.action[this.action] == 'function'){
					self.action[this.action](jHash.val());
				}else{
					self.action[this.action] = jHash.val();
				}
			}
			self.categorySwitch(Label.SEARCH_PAGE);
		});
		
		jHash.route(Label.SEARCH_PAGE+"/member/{memberId}", function () {
			if(this.memberId){
				self.action.memberId(this.memberId);
			}
			//self.categorySwitch(Label.SEARCH_PAGE);
		});
		
		jHash.change(function(handler) {
		    // called when "hashchange" event is fired
		    // perform some action
			$(window).scrollTop(0);
			//$('html, body').animate({scrollTop: '0px'}, 300);
		});
		
		jHash.defaultRoute("home");
		jHash.processRoute();
	};
});
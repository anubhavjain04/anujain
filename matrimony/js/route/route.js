define(function (require) {
    
	var ko               = require('knockout');
	var $                = require('jquery');

	return function(root){ 
		var self = this;
		self.root = root;
		
		self.action = {
			// search page
			criteria : self.root.searchMainVM.searchPage,
			results : self.root.searchMainVM.showResults,
			memberId : self.root.searchMainVM.showMember
		};
		
		jHash.route(self.root.label.HOME_PAGE, function () {
			self.root.categorySwitch(self.root.label.HOME_PAGE);
		});
		jHash.route(self.root.label.REGISTER_PAGE, function () {
			self.root.categorySwitch(self.root.label.REGISTER_PAGE);
		});
		jHash.route(self.root.label.UPGRADE_PAGE, function () {
			self.root.categorySwitch(self.root.label.UPGRADE_PAGE);
		});
		jHash.route(self.root.label.ABOUTUS_PAGE, function () {
			self.root.categorySwitch(self.root.label.ABOUTUS_PAGE);
		});
		jHash.route(self.root.label.PRIVACY_POLICY, function () {
			self.root.categorySwitch(self.root.label.PRIVACY_POLICY);
		});
		jHash.route(self.root.label.TERMS_N_CONDITIONS, function () {
			self.root.categorySwitch(self.root.label.TERMS_N_CONDITIONS);
		});
		jHash.route(self.root.label.CONTACT_US, function () {
			self.root.categorySwitch(self.root.label.CONTACT_US);
		});
		
		jHash.route(self.root.label.SEARCH_PAGE+"/{action}", function () {
			if(this.action && self.action[this.action]){
				if(typeof self.action[this.action] == 'function'){
					self.action[this.action](jHash.val());
				}else{
					self.action[this.action] = jHash.val();
				}
			}
			self.root.categorySwitch(self.root.label.SEARCH_PAGE);
		});
		
		jHash.route(self.root.label.SEARCH_PAGE+"/member/{memberId}", function () {
			if(this.memberId){
				self.action.memberId(this.memberId);
			}
			self.root.categorySwitch(self.root.label.SEARCH_PAGE);
		});
		
		jHash.change(function() {
		    // called when "hashchange" event is fired
		    // perform some action
			$(window).scrollTop(0);
			//$('html, body').animate({scrollTop: '0px'}, 300);
		});
		
		jHash.defaultRoute("home");
		jHash.processRoute();
	};
});
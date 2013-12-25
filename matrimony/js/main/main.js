define(function (require) {    
	var ko 			= require('knockout');
	var $ 			= require('jquery');
	var Label       = require('label');
	var Facet		= require('facet/facet');
	var SearchMain	= require('search/searchMain');
	var RegisterMain= require('register/registerMain');
	var MemberMain= require('member/memberMain');
	var Route	    = require('route/route');
	var Login	    = require('login/login');
	
	/*ko.bindingHandlers.datetimepicker = {
	    init: function (element, valueAccessor, allBindingsAccessor) {
			var startDate = new Date();
			startDate.setFullYear(startDate.getFullYear()-70);
			
			var endDate = new Date();
			endDate.setFullYear(endDate.getFullYear()-18);
			
	        $(element).datetimepicker({
	            format: 'MM/dd/yyyy HH:mm PP',
	            language: 'en',
	            pick12HourFormat: true,
	            pickSeconds: false,
	            startDate: startDate,
	            endDate: endDate
	        }).on("changeDate", function (ev) {
	            var observable = valueAccessor();
	            observable(ev.date);
	        });
	    },
	    update: function (element, valueAccessor) {
	        var value = ko.utils.unwrapObservable(valueAccessor());
	        $(element).datetimepicker("setValue", value);
	    }
	};*/	

	return function mainViewModel(){ 
		var self = this;
		self.label = Label;
		self.showAjaxLayer = ko.observable(false);
		self.root = ko.observable(this).publishOn("requestRootObject");
		self.categorySwitch = ko.observable(Label.SEARCH_PAGE).syncWith("requestCategorySwitch", true, false);
		self.user = ko.observable().subscribeTo("loggedInUser", true);
		self.publishMember = ko.observable().subscribeTo("loggedInMember", true);
		self.toggleClass = function(element, className){
			$(element).toggleClass(className);
		};
		
		self.hideErrorMessage = function(){			
			//console.log("ssdfsf");			
		};
		
		self.facet = new Facet();
		self.facetVM = new self.facet.facetViewModel();
		self.facetVM.init();
		
		self.searchMain = new SearchMain();
		self.searchMainVM = new self.searchMain.searchMainViewModel();
		
		self.registerMain = new RegisterMain();
		self.registerMainVM = new self.registerMain.registerMainViewModel();
		
		self.memberMain = new MemberMain();
		self.memberMainVM = new self.memberMain.memberMainViewModel();
		
		self.login = new Login();
		self.loginVM = new self.login.loginViewModel();
		self.loginVM.init();
		
		self.route = new Route(self);
	};
});
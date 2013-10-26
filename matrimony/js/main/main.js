define(function (require) {    
	var ko 			= require('knockout');
	var $ 			= require('jquery');
	var Label       = require('label');
	var Facet		= require('facet/facet');
	var SearchMain	= require('search/searchMain');
	var RegisterMain= require('register/registerMain');
	var Route	    = require('route/route');
	
	ko.bindingHandlers.datetimepicker = {
	    init: function (element, valueAccessor, allBindingsAccessor) {
	        $(element).datetimepicker({
	            format: 'MM/dd/yyyy HH:mm PP',
	            language: 'en',
	            pick12HourFormat: true
	        }).on("changeDate", function (ev) {
	            var observable = valueAccessor();
	            observable(ev.date);
	        });
	    },
	    update: function (element, valueAccessor) {
	        var value = ko.utils.unwrapObservable(valueAccessor());
	        $(element).datetimepicker("setValue", value);
	    }
	};	

	return function mainViewModel(){ 
		var self = this;
		self.label = new Label();
		self.showAjaxLayer = ko.observable(false);
		self.categorySwitch = ko.observable(self.label.SEARCH_PAGE).syncWith("requestCategorySwitch", true, false);
		self.toggleClass = function(element, className){
			$(element).toggleClass(className);
		};
		
		self.hideErrorMessage = function(aa, bb, cc){
			//console.log(aa);
			//console.log(bb);
			//console.log(cc);
		};
		
		self.facet = new Facet();
		self.facetVM = new self.facet.facetViewModel(self);
		self.facetVM.init();
		
		self.searchMain = new SearchMain();
		self.searchMainVM = new self.searchMain.searchMainViewModel(self);
		
		self.registerMain = new RegisterMain();
		self.registerMainVM = new self.registerMain.registerMainViewModel(self);
		
		self.route = new Route(self);
	};
});
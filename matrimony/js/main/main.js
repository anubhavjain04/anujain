define(function (require) {    
	var ko 			= require('knockout');
	var $ 			= require('jquery');
	var Label       = require('label');
	var SearchMain	= require('search/searchMain');
	var Route	    = require('route/route');

	return function mainViewModel(){ 
		var self = this;
		self.label = new Label();
		self.showAjaxLayer = ko.observable(false);
		self.categorySwitch = ko.observable(self.label.SEARCH_PAGE);
		self.toggleClass = function(element, className){
			$(element).toggleClass(className);
		};
		
		self.searchMain = new SearchMain();
		self.searchMainVM = new self.searchMain.searchMainViewModel(self);
		
		self.route = new Route(self);
	};
});
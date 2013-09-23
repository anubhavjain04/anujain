define(function (require) {    
	var ko 			= require('knockout');
	var $ 			= require('jquery');
	var Label       = require('label');
	var Facet		= require('facet/facet');
	var SearchMain	= require('search/searchMain');
	var RegisterMain= require('register/registerMain');
	var Route	    = require('route/route');

	return function mainViewModel(){ 
		var self = this;
		self.label = new Label();
		self.showAjaxLayer = ko.observable(false);
		self.categorySwitch = ko.observable(self.label.SEARCH_PAGE);
		self.toggleClass = function(element, className){
			$(element).toggleClass(className);
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
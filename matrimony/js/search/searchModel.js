// JavaScript Document
var SearchViewModel = function(searchSpec){
	var self = this;
	self.sex = ko.observable(searchSpec.sex);
	self.ageFrom = ko.observable(searchSpec.ageFrom);
	self.ageTo = ko.observable(searchSpec.ageTo);
	self.heightFrom = ko.observable(searchSpec.heightFrom);
	self.heightTo = ko.observable(searchSpec.heightTo);
	
	self.convertHeightInWords = function(height){
		if(isNaN(height))
			return "";			
		var height = parseFloat(height)/2.54;
		var feet = parseInt(height/12);
		var inches = parseInt(height%12);
		return feet+" feets "+inches+" inches";
		
	};
	
	self.heightFromInwords = ko.computed(function(){
		return self.convertHeightInWords(self.heightFrom());
	}, self);
	
	self.heightToInwords = ko.computed(function(){
		return self.convertHeightInWords(self.heightTo());
	}, self);
	
	//self.searchSpec = ko.observable(searchSpec);
	
	/*self.changeValue = function(){
		self.ageFrom(35);
	};*/
	
	
};

$(document).ready(function(e) {
    var model = new SearchViewModel(searchSpec);	
    ko.applyBindings(model);
	
	//model.searchSpec().ageFrom = 35;
});

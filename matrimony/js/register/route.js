define(function (require) {
    
	var ko      = require('knockout');
	var $       = require('jquery');
	var Label   = require('label');

	return function(mainVM){ 
		var self = this;
		self.mainVM = mainVM;		
		//self.searchVM = self.mainVM.searchVM;
		self.label = new Label();
		
		
	};
});
define(function (require) {
	var ko               = require('knockout'),
	$                    = require('jquery'),
	Dialog               = require('dialogModel'); 
	return function(parent) {
		var self = this;
		self.parent = parent;
		
		// Initialize function
		self.init = function() {
			
		};
		self.searchDialogViewModel = function() {
			var vm = this;
			
			// initialize dialog
			vm.dialog = new Dialog();
			
			
			
			vm.ageDialog = new vm.dialog.dialogViewModel({"title":"Age"});
			vm.heightDialog = new vm.dialog.dialogViewModel({"title":"Height"});
			
		};
	};
});
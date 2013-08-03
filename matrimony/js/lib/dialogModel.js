define(function (require) {
	var ko               = require('knockout'),
	$                    = require('jquery');  
	
	return function() {
		var self = this;
		// Initialize function
		self.init = function() {
			
		};
		self.defaultOptions = {
			autoOpen: false,
			show: {
				effect: "blind",
				duration: 200
			},		
			resizable: false,
			height:150,
			modal: true,
			open: function( event, ui ) {},
			close: function( event, ui ) {},
			buttons: [ { text: "Ok", click: function() { $(this).dialog("close");}}]
		};
		
		self.dialogViewModel = function(options) {
			var vm = this;
			vm.dialogOptions = $.extend({}, self.defaultOptions, options);
			vm.bindDialog = ko.observable(vm.dialogOptions);
			vm.isOpen = ko.observable(false);
			vm.openDialog = function() {
			   vm.isOpen(true);   
			};
			vm.closeDialog = function() {
			   vm.isOpen(false);   
			};
		};
	};
});
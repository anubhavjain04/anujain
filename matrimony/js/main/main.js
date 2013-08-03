// JavaScript Document
//Main viewmodel class
define(function (require) {
    
	var ko               = require('knockout'),
	$                    = require('jquery');
	
	return function mainViewModel() {

		var self = this;

		self.init = function (id) {
			//console.log('init called');
		};
		
		self.testMe = ko.observable("anubhav testing");
		
	};
});
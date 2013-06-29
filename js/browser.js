// JavaScript Document
$(function(){
var userAgent = navigator.userAgent.toLowerCase();
var userBrowserName  = navigator.appName.toLowerCase();
// Figure out what browser is being used
$.browser = {
	version: (userAgent.match( /.+(?:rv|it|ra|ie)[\/: ]([\d.]+)/ ) || [0,'0'])[1],
	safari: /webkit/.test( userAgent ),
	opera: /opera/.test( userAgent ),
	msie: /msie/.test( userAgent ) && !/opera/.test( userAgent ),
	mozilla: /mozilla/.test( userAgent ) && !/(compatible|webkit)/.test( userAgent ),
	chrome: /chrome/.test( userAgent ),
	name:userBrowserName
};

});
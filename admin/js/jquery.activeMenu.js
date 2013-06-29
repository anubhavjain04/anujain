/*
 * Active Menu jQuery Plugin 1.0.0
 *
 * Copyright (c) 2009 Chad Ort
 * http://www.caodesigns.com/blog/free-stuff/jquery-active-menu-plugin-2.php?postID=39
 */

/*
Usage
$(ULITEM).activeMenu(OPTIONS);

ULITEM: the item which want the functionality of auto activation tab e.g. #mainMen, .mainMenu etc
OPTIONS: 
In case of no options default options will be used
Example options
$(ULITEM).activeMenu({
	idSwitch: 'someId',
	defaultSite: 'mysite.com',
	defaultIndex: 0
	});
	
in case of mysite.com url first tab will be activated	
*/
(function($){
$.fn.activeMenu = function(options){
	var defaults = {  
		idSwitch: 'selected',
		defaultSite: null,
		defaultIndex: 0
	},  
	intialize = function(id){
		var op = $.extend({},defaults,options);
		var loc = location.href;
		/*if(sitePath!=null && controller!=null && action!=null){
			if(action!="admin"){
				loc = sitePath+controller+"/admin";
			}
		}*/
		
		var activeCount = 0;
		$(id).find('a').each(function(){
			var href = $(this).attr('href');
			if(loc.search(href) != -1){
				$(this).attr('id', op.idSwitch);
				
				
				///////Code to show the selected toggle starts here////////////
			
				$("#nav li:first a.heading").removeClass("expanded").addClass("collapsed");
				$("#nav li:first a.heading + ul").slideUp("medium");
				
				$(this).parent().parent().parent().children("a.heading").removeClass("collapsed").addClass("expanded");
				$(this).parent().parent().parent().children("a.heading").find("+ ul").slideDown("medium");
			
			///////Code to show the selected toggle Ends here////////////
				
				
				
				activeCount++;
			}
			else{
				$(this).attr('id', '');
			}
			
			if(activeCount == 0){
				if(loc.search(op.defaultSite) != -1){
					$(id).find('a').eq(0).attr('id', op.idSwitch);
				}
			}
		});
		
	}
	
	return this.each(function(){
		intialize(this);					  
	});
}
})(jQuery);
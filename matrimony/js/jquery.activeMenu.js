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
		classSwitch: 'current',
		defaultSite: null,
		defaultIndex: 0
	},  
	intialize = function($this){
		var op = $.extend({},defaults,options);
		var loc = location.href;
		var activeCount = 0;
		$($this).find('a').each(function(){
			var href = $(this).attr('href');
			var checkLast = "index.php";
			if(loc.search(href) != -1 && href.slice(-checkLast.length)!=checkLast){
				if(!$(this).hasClass(op.classSwitch)){
					$(this).addClass(op.classSwitch);	
				}
				activeCount++;
			}
			else{
				$(this).removeClass(op.classSwitch);
			}
			
		});
		if(activeCount == 0){
			var firstAction = $($this).find('a:first');
			if(!firstAction.hasClass(op.classSwitch))
				firstAction.addClass(op.classSwitch);			
		}		
	}	
	return this.each(function(){
		intialize(this);					  
	});
}
})(jQuery);
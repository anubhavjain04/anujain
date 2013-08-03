$(function() {	
	$("#formRegularSearch, #formByIDSearch").validationEngine({
		isOverflown: false,
        overflownDIV: ""
	});
	
	$("#tabs").tabs({
		beforeActivate: function( event, ui ){
			$('#formByIDSearch').validationEngine('hide');
			$('#formRegularSearch').validationEngine('hide');
		}
	});
   	if($("#tabs") && document.location.hash){
		$.scrollTo("#tabs");
   	}
   	$("#tabs ul").localScroll({
		target:"#tabs",
		duration:0,
		hash:true
	});
});
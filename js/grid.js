// JavaScript Document
// written by : Anubhav Jain
;(function($) {
	$.fn.grid = function(options) {
		return this.each(function(){
		});
	};
	
	$.fn.grid.update = function(id, options) {
		console.log(options);
		options = $.extend({
			type: 'GET',
			url: $("#"+id+"_pageURL").val(),
			data: {},
			success: function(data,status) {
				$d=$(data);
				$("#"+id).html(($d.find("#"+id).html()));
				$('#'+id+"_loader").removeClass("loader");
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				$('#'+id+"_loader").removeClass("loader");
				alert(XMLHttpRequest.responseText);
			}
		}, options || {});
		
		$('#'+id+"_loader").addClass("loader");
		$.ajax(options);
		
	};
})(jQuery);	
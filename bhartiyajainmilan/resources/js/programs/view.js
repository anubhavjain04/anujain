// JavaScript Document
$(document).ready(function(e) {
	$("#pageSize").val($("#pageSize").attr("pval"));
	$("#pageSize").change(function(e) {
		var pageSize = $(this).val();
		$.fn.grid.update("grid-data", {data: {pageSize: pageSize}});			
	});
	
	$("#pager a").live("click", function(e) {
		$.fn.grid.update("grid-data", {url: $(this).attr("href")});
		return false;
	});
	
	$("#filters input").change(function(e) {
		$.fn.grid.update("grid-data", {url: $("#grid-data_searchURL").val(), data: $.param($("#filters input"))});
		return false;
	});
});
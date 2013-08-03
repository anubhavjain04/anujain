$(function() {
	$("#formSearch").validationEngine({
		isOverflown: false,
		bindMethod: "live",
        overflownDIV: ""
	});
	
	var icons = {
		header: "ui-icon-circle-arrow-e",
		activeHeader: "ui-icon-circle-arrow-s"
	};

	$("#accordion").accordion({
		collapsible: true,
		icons: icons,
		heightStyle: "content"
	});
	
	/*if(searchSpec){
		setAge(searchSpec.ageFrom, searchSpec.ageTo);
		setHeight(searchSpec.heightFrom, searchSpec.heightTo);
	}*/
});
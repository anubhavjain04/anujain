function setAge(from, to){
	$("#s_age").html(from+" years to "+to+" years");
}
function setHeight(from, to){
	$("#s_height").html($("#heightFrom [value='"+from+"']").text()+" to "+$("#heightFrom [value='"+to+"']").text());
}


function validateElement(element){
	return element.validationEngine('validate');
}

/*function submitData(){
	if(validateElement($("#formSearch"))){
		//alert("submit");
	}
}*/

/** age **/
/*function openAge(){
	$("#ageFrom").val($("#Search_ageFrom").val());
	$("#ageTo").val($("#Search_ageTo").val());
	
}
function updateAge(){
	if(validateElement($("#dgAge"))){
		var from = $("#ageFrom").val();
		var to = $("#ageTo").val();
		$("#Search_ageFrom").val(from);
		$("#Search_ageTo").val(to);
		setAge(from, to);
		$("#dgAge").dialog("close");		
	}
}
*/
/** height **/
/*function openHeight(){
	$("#heightFrom").val($("#Search_heightFrom").val());
	$("#heightTo").val($("#Search_heightTo").val());
	
}
function updateHeight(){
	if(validateElement($("#dgHeight"))){
		var from = $("#heightFrom").val();
		var to = $("#heightTo").val();
		$("#Search_heightFrom").val(from);
		$("#Search_heightTo").val(to);
		setHeight(from, to);
		$("#dgHeight").dialog("close");		
	}
}
*/
$(function(){
	/*$("#dgAge").dialog({
		autoOpen: false,
		show: {
			effect: "blind",
			duration: 200
		},		
		resizable: false,
		height:140,
		modal: true,
		open: function( event, ui ) {openAge();},
		close: function( event, ui ) {},
		buttons: [ { text: "Submit", click: function() { updateAge();}},
				   { text: "Cancel", click: function() { $(this).dialog("close");}}
				 ]
	}).parent().appendTo("#formSearch");*/
	
	$("#dgHeight").dialog({
		autoOpen: false,
		show: {
			effect: "blind",
			duration: 200
		},		
		resizable: false,
		height:140,
		width: 400,
		modal: true,
		open: function( event, ui ) {openHeight();},
		//close: function( event, ui ) {},
		buttons: [ { text: "Submit", click: function() { updateHeight();}},
				   { text: "Cancel", click: function() { $(this).dialog("close");}}
				 ]
	}).parent().appendTo("#formSearch");
	
	$("#dgMaritalStatus").dialog({
		autoOpen: false,
		show: {
			effect: "blind",
			duration: 200
		},		
		resizable: false,
		width: 600,
		height:150,
		modal: true,
		open: function( event, ui ) {openHeight();},
		//close: function( event, ui ) {},
		buttons: [ { text: "Submit", click: function() { updateHeight();}},
				   { text: "Cancel", click: function() { $(this).dialog("close");}}
				 ]
	}).parent().appendTo("#formSearch");
});
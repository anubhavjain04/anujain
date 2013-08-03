function checkGenderAge(varSAge) {
	var objFrom = $("#ageFrom");
	var objTo = $("#ageTo");
	var From = parseInt(objFrom.val());
	var To = parseInt(objTo.val());
	
	var fromAge = buildAge(varSAge,'From',From);
	var toAge = buildAge(varSAge,'To',To);
	
	$("#ageFrom").html(fromAge);
	$("#ageTo").html(toAge);	
}


function buildAge(ageSt,varRange,ageMFEd){
	varEAge = 70;
	varRetrun='';
	for(ageS = ageSt; ageS<=varEAge; ageS++) {
		varSelect = (ageS==ageMFEd)? 'selected':'';
		varRetrun += "<option value="+ageS+" "+varSelect+">"+ageS+"</option>";
	}
	return varRetrun;
}

function validateMaritalStatus(field, rules, i, options){
	var allMaritalStatus = $("input[type=checkbox][id^=Search_maritalStatus]");
	var maritalStatus = allMaritalStatus.filter(":checked");
	if(maritalStatus){
		if(maritalStatus.length > 1){
			for(var i=0; i<maritalStatus.length; i++){
				if(maritalStatus[i].id=="Search_maritalStatus_0"){
					$(maritalStatus[i]).attr("checked", false);
				}
			}
			if(field.attr("id")=="Search_maritalStatus_0"){
				maritalStatus.attr("checked", false);
				field.attr("checked", true);
			}
		}
	}
}

function validateAgeRange(field, rules, i, options){
	var objFrom = $("#ageFrom");
	var objTo = $("#ageTo");
	var From = parseInt(objFrom.val());
	var To = parseInt(objTo.val());
	objFrom.validationEngine('hide');
	objTo.validationEngine('hide');
	if(From>To){		
		return "Age From cann't be grater than Age To.";
	}
}

function validateHeightRange(field, rules, i, options){
	var objFrom = $("#heightFrom");
	var objTo = $("#heightTo");
	var From = parseFloat(objFrom.val());
	var To = parseFloat(objTo.val());
	objFrom.validationEngine('hide');
	objTo.validationEngine('hide');
	if(From>To){		
		return "Height From cann't be grater than Height To.";
	}
}

function getSubSect(sectId, url){
	if(sectId){
		$("#subsect").attr("disabled",true);
		$.ajax({
			type: "POST",	
			url: url,
			data: { sectId: sectId},
			success: function(data) {
				$("#subsect option:not(:eq(0))").remove();
				$("#subsect").append(data);
				$("#subsect").attr("disabled",false);
			},
			error: function(msg){
				alert("Error:: "+msg);
				$("#subsect").attr("disabled",false);
			}
		});
	}else{
		$("#subsect option:not(:eq(0))").remove();
	}
}
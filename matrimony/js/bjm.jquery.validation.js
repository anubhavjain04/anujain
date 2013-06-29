/**
 * @param {jqObject} the field where the validation applies
 * * @param {Array[String]} validation rules for this field             
 * * @param {int} rule index             
 * * @param {Map} form options             
 * * @return an error string if validation failed             
 * */
var redirectionPath = null;
var saveStatus = 0;
function checkDigit(field, rules, i, options){
	var octNo = $.trim(field.val());
	for(i=0; i<octNo.length; i++){
		var charon = octNo.charAt(i);
		if(isNaN(charon)){
			return "This is not a octal no.";
		}else{
			if(parseInt(charon)>7){
				return "This is not a octal no.";
			}
		}
	}
}
function checkTime(field, rules, i, options){
	var time = $.trim(field.val());
	var timeArr = String(time).split(":");
	if(timeArr.length!=3){
		return "Please write in hh:mm:ss format";
	}
	if(isNaN(timeArr[0]) || isNaN(timeArr[1]) || isNaN(timeArr[2])){
		return "Please write in hh:mm:ss format";
	} 
	var hh = parseInt(timeArr[0]);
	var mm = parseInt(timeArr[1]);
	var ss = parseInt(timeArr[2]);
	
	if(hh>24){
		return "Hour cann't greater than 24";
	}
	if(mm>60){
		return "Minutes cann't greater than 60";
	}
	if(ss>60){
		return "Seconds cann't greater than 60";
	}
	field.val(hh+":"+mm+":"+ss);
	            
}
function dateValid(field, rules, i, options) {
	//var time = $.trim(field.val());
	/*var date = $.trim(field.val());
	var dateArr = String(date).split("/");
	//var timeArr = String(time).split(":");
	if(dateArr.length!=3){
		return "Please write in dd/mm/yyyy format";
	}
	if(isNaN(dateArr[0]) || isNaN(dateArr[1]) || isNaN(DateArr[2])){
		return "Please write in dd/mm/yyyy format";
	} 
	var dd = parseInt(dateArr[0]);
	var mm = parseInt(dateArr[1]);
	var yyyy = parseInt(dateArr[2]);
	
	field.val(dd+"/"+mm+"/"+yyyy);
	
    date = $('#etd_date').val();
    alert(date);
    return Date.parse(date) <= Date.parse(value) || value == "";
    alert("ETD/ETA fields are wrongly entered by operator");
    $('#frmFPGICNo').validate();*/
}
function showMessageBox(){
	$("#messageLoader").show();
}
function hideMessageBox(){
	$("#messageLoader").hide();
}
function redirectAfterProcess(){
	if(redirectionPath!=null){
		window.location.href=redirectionPath;
	}
}
function updateMessages(msg){
	$("#msgdata").append(msg+"<br>");
}
function validateOther(){
	var noOfAC = $("#noOfAC").val();
	if(noOfAC==null || noOfAC=="" || isNaN(noOfAC)){
		alert("Please write a No. of A/C first");
		$("#noOfAC").focus();
		return false;
	}
	var noOfACinNUM = parseInt(noOfAC);
	var pltTR = $("#pltDetTable tr");
	if(pltTR==null){
		return false;
	}
	var rowSize = pltTR.length - 1;
	if(rowSize!=noOfACinNUM){
		alert("No. of A/C and PLT Details not match.");
		return false;
	}	
	
	
	var routeOption = $("#routeBaseStations option");
	if(routeOption==null || routeOption.length<2){
		alert("Minimum 2 points are required to define a route.");
		return false;
	}
	if(typeof e_timeDetArr[0] == "undefined" || $.trim(e_timeDetArr[0].toString())=="" || typeof e_timeDetArr[1] == "undefined" || $.trim(e_timeDetArr[1].toString())==""){
		if(typeof e_timeDetArr[0] == "undefined" || $.trim(e_timeDetArr[0].toString())=="")
			alert("ETD is mandatory field.");
		if(typeof e_timeDetArr[1] == "undefined" || $.trim(e_timeDetArr[1].toString())=="")
			alert("ETA is mandatory field.");
		return false;
	}
	
	return true;
}
function listenLocResponse(refId){
	updateMessages("Polling response from local zone server for ref id "+ refId +"....");
	$.ajax({
		url: "getRespLoc.action",
		cache: false,
		type: "POST",
		data: {refId:refId},
		success: function(data){
			var found = false;
			var strData = String(data);
			var dataArr = $.trim(strData).split(":");
			if(dataArr.length==2){
				if(dataArr[0]=="success"){	
					if(dataArr[1]!=""){
						updateMessages(dataArr[1]);
						found = true;
						saveStatus=1;
						alert("Flight plan saved successfully.");
						$("#okmsg").show();
					}
				}
			}
			if(!found){
				setTimeout(function(){
					listenLocResponse(refId);	
				}, 3000);
			}
		},
		error: function(){
			alert("error found.. when getting response from location server");
		}
	});
}

function getADCNo(gblFPFICId, refNo){
	var thisADCNo = $("#adcNo");
	thisADCNo.addClass("smallLoader");
	updateMessages("Polling ADC number....");
	$.ajax({
		url: "getADCNo.action",
		cache: false,
		type: "POST",
		data: {gblFPFICId:gblFPFICId},
		success: function(data){
			var found = false;
			var strData = String(data);
			var dataArr = $.trim(strData).split(":");
			if(dataArr.length==2){
				if(dataArr[0]=="success"){	
					if(dataArr[1]!=""){
						thisADCNo.val(dataArr[1]);
						thisADCNo.removeClass("smallLoader");
						updateMessages("Generated ADC number is "+dataArr[1]+".");
						found = true;
						listenLocResponse(refNo);
					}
				}
			}
			if(!found){
				setTimeout(function(){
					getADCNo(gblFPFICId, refNo);	
				}, 3000);
			}
		},
		error: function(){
			alert("error found.. when getting ADC No.");
		}
	});
}

function sendRefNoforCollision(refNo, gblFPFICId){
	updateMessages("Checking flight plan for collision.... ");
	$.ajax({
		url: "checkCollision.action",
		cache: false,
		type: "POST",
		data: {refNo:refNo},
		success: function(data){
			var strData = String(data);
			var dataArr = $.trim(strData).split(":");
			if(dataArr.length==2){
				if(dataArr[0]=="success"){	
					if(dataArr[1]!=""){
						updateMessages(dataArr[1]);
						getADCNo(gblFPFICId, refNo);
					}
				}
			}
		},
		error: function(){
			alert("error found.. When checking flight plan for collision.");
		}
	});
}


function getRefNo(gblFPFICId){
	var thisRefNo = $("#refNo");
	thisRefNo.addClass("smallLoader");
	updateMessages("Polling referance number.. ");
	$.ajax({
		url: "getRefNo.action",
		cache: false,
		type: "POST",
		data: {gblFPFICId:gblFPFICId},
		success: function(data){
			var foundRef = false;
			var strData = String(data);
			var dataArr = $.trim(strData).split(":");
			if(dataArr.length==2){
				if(dataArr[0]=="success"){	
					if(dataArr[1]!=""){
						thisRefNo.val(dataArr[1]);
						thisRefNo.removeClass("smallLoader");
						updateMessages("Generated referance number is -> "+dataArr[1]);
						foundRef = true;
						//getADCNo(gblFPFICId);
						sendRefNoforCollision(dataArr[1], gblFPFICId);
					}
				}
			}
			if(!foundRef){
				setTimeout(function(){
					getRefNo(gblFPFICId);	
				}, 3000);
			}
		},
		error: function(){
			alert("error found.. When getting Ref. No.");
		}
	});
}
function savePlan(redirectPath){
	var status = $("#frmFPGICNo").validationEngine('validate');
	if(!status){
		return false;
	}
	
	if(!validateOther()){
		return false;
	}
	
	
	showLoader("Processing....");
	showMessageBox();
	updateMessages("Saving flight plan..");
	$.ajax({
		url: $("#frmFPGICNo").attr("action"),
		cache: false,
		type: "POST",
		data: $("#frmFPGICNo").serialize(),
		success: function(data){
			var strData = String(data);
			var dataArr = $.trim(strData).split(":");
			if(dataArr.length==2){
				if(dataArr[0]=="success"){	
					if(dataArr[1]!=""){
						updateMessages("Flight plan saved successfully.");
						redirectionPath = redirectPath;
						getRefNo(dataArr[1]);
					}
					//alert("Flight plan saved successfully");
					
					//window.location.href=redirectPath;
				}else{
					alert("Incomplete Flight plan is entered");
				}
			}else{
				alert("Incomplete Flight plan is entered");
			}
			
			//hideLoader();
		},
		error: function(){
			alert("error found.. when saving plan.");
			hideLoader();
		}
	});
	
	//$("#frmFPGICNo").submit();
}
$(document).ready(function(){
	$("#frmFPGICNo").validationEngine({
		isOverflown: false,
        overflownDIV: ""
	});    
	/** check validation
	 * if etd hh or mm or ss if filled then fill all  
	*/
	$("#savePlan").click(function(){
		savePlan("FPView.action");
	});
	$("#saveNewPlan").click(function(){
		savePlan("globlalFlightPlanWithFic_Action.action");
	});
	
	$("#okmsg").click(function(){
		if(saveStatus==1){
			hideMessageBox();
			hideLoader();
			redirectAfterProcess();
		}
	});
	
	$("#upadtePlan").click(function(){
		var status = $("#frmFPGICNo").validationEngine('validate');
		if(!status){
			return false;
		}
		
		if(!validateOther()){
			return false;
		}
		
		showLoader("Processing....");
		$.ajax({
			url: $("#frmFPGICNo").attr("action"),
			cache: false,
			type: "POST",
			data: $("#frmFPGICNo").serialize(),
			success: function(data){
				var strData = String(data);
				var dataArr = $.trim(strData).split(":");
				if(dataArr.length==2){
					if(dataArr[0]=="success"){	
						alert("Plan Updated Successfully.");
						window.location.href="FPView.action";
					}else{
						alert("Error in save plan.");
					}
				}else{
					alert("Error in save plan.");
				}
				hideLoader();
			},
			error: function(){
				alert("error found.. when updating plan.");
				hideLoader();
			}
		});
	});
});
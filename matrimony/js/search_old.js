var chkSelbox = new Array('denomination', 'caste', 'subcaste', 'motherTongue', 'country', 'residingState', 'residingCity', 'education','gothram','star','raasi','occupation');
function funMaritalStatus()
{
	$('#maritalStatus0').attr('checked',false);
	if($('#maritalStatus0').attr('checked')=='checked' || $('#maritalStatus2').attr('checked')=='checked' || $('#maritalStatus3').attr('checked')=='checked' || $('#maritalStatus4').attr('checked')=='checked' || $('#maritalStatus5').attr('checked')=='checked'){
			$("#childblock").show();
		}else {
			$("#childblock").hide();
		}
		if($('#maritalStatus1').attr('checked')=='checked' || $('#maritalStatus2').attr('checked')=='checked' || $('#maritalStatus3').attr('checked')=='checked' || $('#maritalStatus4').attr('checked')=='checked'  || $('#maritalStatus5').attr('checked')=='checked' ||  $('#maritalStatus7').attr('checked')=='checked'){
			$('#maritalStatus0').attr('checked', false);
		}

		if($("#Maritalvalidation :checkbox").length-1 == $("#Maritalvalidation :checkbox:checked:not(#maritalStatus0)").length){
			$("#Maritalvalidation :checkbox").attr('checked', false);
			$('#maritalStatus0:checkbox').attr('checked',true);
		}
	}


function annuIncome(){

	var a=$('#annualIncome').val();
	
	var c=parseInt(a)+1;

	  if(a>=0.5 && a<10){
			var c=parseInt(a)+1;}
		if(a>=10 && a<20){
			var c=parseInt(a)+2;}
					if(a>=20 && a<50){
			var c=parseInt(a)+5;}
					if(a>=50 && a<100){
			var c=parseInt(a)+10;}
			        if(a==100){
			var c=parseInt(a)+1;}

	if($('#annualIncome').val()>=0.5 && $('#annualIncome').val()<101){
	$('#annualIn').show();
	$('#annualIncome1').val(c);
	
	
	}else{
		$('#annualIn').hide();
	}
}

function funMaritalStatusAny()
{
		$("#marerr").hide();
	if($('#maritalStatus0').attr('checked')=='checked'){
	
		$("#childblock").show();}else{
		$("#childblock").hide();}
		var marstat='';
		//$("#childblock").show();

	$("#Maritalvalidation input[type=checkbox][name=maritalStatus[]]").each(function(){
		var checkboxvalues = this.value;
		if(checkboxvalues!=0){
			$(this).attr('checked', false);
		}
	});
}

function validateAge() {
	
	var stAge=$("#ageFrom").val();
	var endAge=$("#ageTo").val();
	var ageer="";
	if(stAge>endAge) {
		ageer="Sorry, Invalid age range";
	} else if(stAge<18) {
		ageer="Min. age is 18";
	} else if(stAge>70) {
		ageer="Max. age is 70";		
	} else if ((parseInt(endAge) - parseInt(stAge)) > 22) {
		ageer='The difference between a partner\'s "From" and "To" age should not exceed 22 years.';
	}

	if (ageer != '') {
		$("#ageerr").html(ageer).show();
		$("#ageFrom").focus();
		return false;
	} else{
		$("#ageerr").hide();
		return true;
	}
}

function validateHeight() {
	
	var frHeight=$("#heightFrom").val();
	var toHeight=$("#heightTo").val();
	if(frHeight>toHeight)
	{
		$("#heighterr").show();
	var heighter="Sorry, Invalid Height range";
		$("#heighterr").html(heighter);
	}
	else{
	
	$("#heighterr").hide();
	}


	
}

function annuIncome1(){
	var frann=Number($("#annualIncome").val());
	var toann=Number($("#annualIncome1").val());
	var anner='';
	if(toann<=frann) {
		anner="Sorry, Invalid annual income range";
	}else{
		anner='';
	}
	$("#annerr").html(anner);

}

function checkGenderAge(varSAge) {
	
	var genderage = $('input:radio[name=gender]:checked').val();
	if(genderage=='2'){
		srchGender='2'; 
		fromAge = buildAge(varSAge,'From',FMStAge);
		toAge = buildAge(varSAge,'To',FMEdAge);
		
		$("#ageFrom").html(fromAge);
		$("#ageTo").html(toAge);
	}else{
		srchGender='1';
		
		fromAge = buildAge(varSAge,'From',MStAge);
		toAge = buildAge(varSAge,'To',MEdAge);
		
		$("#ageFrom").html(fromAge);
		$("#ageTo").html(toAge);
		if(MaritalCnt==5){funMaritalStatus('RSearchForm');}
	}
}


function buildAge(ageSt,varRange,ageMFEd){
	varEAge = 70;
	varRetrun='';
	varRetrun = "<option value=''>"+varRange+"</option>";
	for(ageS = ageSt; ageS<=varEAge; ageS++) {
		
		varSelect = (ageS==ageMFEd)? 'selected':'';
		varRetrun += "<option value="+ageS+" "+varSelect+">"+ageS+"</option>";
	}
	return varRetrun;
}

function validate(formobj) {
	
	// Age Validate
	if (!validateAge()) return false;
	
	// Height Vlidate
	var frHeight=$("#heightFrom").val();
	var toHeight=$("#heightTo").val();
	if(frHeight>toHeight)
	{
		var heighter="Sorry, Invalid Height range";
		$("#heightFrom").focus();
		$("#heighterr").html(heighter);
		return false;
	}
	
if($("#Maritalvalidation input[type=checkbox][name=maritalStatus[]]:checked").length==0){

		var marer="Please select the marital status";
		$("#marerr").show();
		//$("html, body").animate({ scrollTop: 350 }, 500);
		$('#maritalStatus0').focus();
		$("#marerr").html(marer);
		return false;
	}
	
	// annual income validate
	var frann=$("#annualIncome").val();
	var toann=$("#annualIncome1").val();
	if(parseInt(frann)>parseInt(toann))
	{
		var anner="Sorry, Invalid annual income range";
		$('#annualIncome').focus();
		$("#annerr").html(anner);
		return false;
	}
	
	for(w=0; w<chkSelbox.length; w++){
	    selObj = eval('this.document.'+formobj+'.'+chkSelbox[w]);
		if(selObj != null){selValues(selObj);}
	}
	
	var SrchForm=eval("this.document."+formobj);
	SrchForm.submit();	 
}

function selValues(theSel){
	var selLength	= theSel.length;
	for(ww=0; ww<selLength; ww++)
	{theSel.options[ww].selected = true;}	
}

/*position find*/
function findPosX(obj)
{
 var curleft = 0;
 if(obj.offsetParent)
 while(1) 
 {
  curleft += obj.offsetLeft;
  if(!obj.offsetParent)break;
  obj = obj.offsetParent;
  }
  else if(obj.x)
  curleft += obj.x;
  return curleft;
}

function findPosY(obj)
{
 var curtop = 0;
 if(obj.offsetParent)
 while(1)
 {
	curtop += obj.offsetTop;
    if(!obj.offsetParent)break;
    obj = obj.offsetParent;
  }
  else if(obj.y)curtop += obj.y;
  return curtop;
}
var t_msgn;

// Added by Jegadeesh on : 17-SEP-2012 : START
function moveOptions(theSelFrom, theSelTo){
	var selLength = theSelFrom.length;
	var selectedText = new Array();
	var selectedValues = new Array();
	var selectedCount = 0;
	var selId = theSelFrom.id;
	var i;
	for(i=selLength-1; i>=0; i--)
	{
		if(theSelFrom.options[i].selected){

			var txt = $("#"+selId+" option:selected").text();
			var value = $("#"+selId+" option:selected").val();
			selectedText[selectedCount] = txt;
			selectedValues[selectedCount] =value;
			deleteOption(theSelFrom, i);
			selectedCount++;
		}
	}
		
	for(i=selectedCount-1; i>=0; i--){	addOption(theSelTo, selectedText[i], selectedValues[i]);}
		
	if(selId == 'countryTemp'){	coun_moveOptions(theSelFrom,theSelTo);}
	else if(selId == 'country'){ coun_moveOptions(theSelTo,theSelFrom);}
	else if(selId == 'residingStateTemp'){	coun_moveOptions(theSelFrom,theSelTo);}
	else if(selId == 'residingState'){ coun_moveOptions(theSelTo,theSelFrom);}
}//moveOptions

function getFirstOptVal(theSelFrom, optVal){
	firstOptVal = theSelFrom.options[0].value;
	if(optVal == 'country'){
		theSelTo = this.document.RSearchForm.countryTemp;
		selLen = theSelTo.length;
		theSelTo.options[0].selected =false;
		for(XX=0; XX<selLen; XX++){
			if(theSelTo.options[XX].value == firstOptVal){
				theSelTo.options[XX].selected =true;break;
			}
		}
		moveOptions(this.document.RSearchForm.countryTemp, this.document.RSearchForm.country);
	}else if(optVal == 'state'){
		coun_moveOptions(this.document.RSearchForm.residingStateTemp, this.document.RSearchForm.residingState)
	}
}
function deleteOption(theSel, theIndex){	
	var selLength = theSel.length;
	if(selLength>0){theSel.options[theIndex] = null;}
}//deleteOption

function coun_moveOptions(theSelFrom,theSelTo)
{
	var selLength	= theSelTo.length;
	var selId		= theSelTo.id;
	var selectedValues = new Array();
	var selectedCount = 0;
	var cityAvail	= 0;
	var stateAvail	= 0;
	var w;

	if(selLength==0 && selId=='country'){	
		$('#residingState').html('');$('#residingStateTemp').html('');
		$('#residingCity').html('');$('#residingCityTemp').html('');
		$('#statesblock').hide();$('#cityblock').hide();
	}else if(selId=='residingState' && selLength==0){
		$('#residingCity').html('');$('#residingCityTemp').html('');
		$('#cityblock').hide();
	}else{
		for(w=selLength-1; w>=0; w--)
		{
			if(selId == 'country'){
				selectedValues[selectedCount]=theSelTo.options[w].value;
				selectedCount++;
				USStateAvail = 0;
				INDStateAvail = 0;
			}
			else if(selId == 'residingState'){
				selectedValues[selectedCount]=theSelTo.options[w].value;
				selectedCount++;
			}
		}
		
		for(w=0; w<selectedCount; w++)
		{
			selVal = selectedValues[w];
			
			if(selId == 'country' && (selVal == 98 || selVal==222) && (INDStateAvail==0 || USStateAvail==0)) {
				$('#statesblock').show();
				if(stateAvail == 0){
				stateAvail = 1;
				$('#residingState').html('');$('#residingCity').html('');
				$('#residingStateTemp').html('');$('#residingCityTemp').html('');
				if($('#cityblock')!=''){$('#cityblock').hide();}
				coun_updatestate(selVal,this.document.RSearchForm.residingStateTemp,'states',theSelFrom);
				}else{coun_updatestate(selVal,this.document.RSearchForm.residingStateTemp,'states',theSelFrom);	}
				if(selVal == 98 && INDStateAvail==0){ INDStateAvail=1;}
				if(selVal == 222 && USStateAvail==0){ USStateAvail=1;}
			}
			else if(selId == 'country' && INDStateAvail==0 && USStateAvail==0) {
				$('#residingState').html('');$('#residingCity').html('');
				$('#residingStateTemp').html('');$('#residingCityTemp').html('');
				$('#statesblock').hide();
				if($('#cityblock')!=''){$('#cityblock').hide();}
			}
			else if(selId == 'residingState' && INDStateAvail ==1 && selVal>0 && selVal<100) {
				if(cityAvail==0){
					cityAvail=1;
					$('#residingCity').html('');$('#residingCityTemp').html('');
					coun_updatecity(selVal,this.document.RSearchForm.residingCityTemp,'cities',theSelFrom);
				}else{coun_updatecity(selVal,this.document.RSearchForm.residingCityTemp,'cities',theSelFrom);}
			}
			else if(selId == 'residingState' && cityAvail==0){
				$('#cityblock').hide(); $('#residingCity').html('');$('#residingCityTemp').html('');
			}
		}
	}	
}//moveOptions

function coun_updatecity(j,obj,aryname,selOption)
{
	var aryname	=eval(aryname);
	var obj1	=$(obj);
	var selId	= selOption.id;
	var k = j;
	if(j>0 && j<100)
	{
		for (var i=0; i<aryname[j].length; i++) {
			$('#cityblock').show();
			addOption(obj,aryname[j][i].split("|")[0],aryname[j][i].split("|")[1]); 
		}
	}else{
		if($('#residingCityTemp').html('')){$('#residingCity').html(''); $('#cityblock').hide();}
	}
}

function addOption(theSel, theText, theValue)
{
	var add_sel = 's';
	sellen	= theSel.length;
	for(i=0; i<sellen;i++){
		if(theSel.options[i].value == theValue){
		add_sel = 'n';
		}
	}

	if(add_sel=='s' && theValue!=''){
	var newOpt = new Option(theText, theValue);
	var selLength = theSel.length;
	theSel.options[selLength] = newOpt;
	}

	sellen	= theSel.length;
	if(sellen > 0){
		for(i=0; i<(sellen-1);i++){
			theSel.options[i].selected=false;	
		}
		theSel.options[(sellen-1)].selected=true;
	}
}//addOption

function coun_updatestate(j,obj,aryname,selOption)
{	
	var aryname = eval(aryname);
	var selId	= selOption.id;
	var selLength = selOption.length;
	var obj1=selOption;
	var optionexits = '';
	if(selId=='country'){
		for(i=selLength-1; i>=0; i--) { var optionexits = optionexits +  '~~' + selOption.options[i].value; }
		optionexits = optionexits+'~~';
		if(j == 98){
			for(var i=0; i<aryname[j].length; i++) { 
			addOption(obj,aryname[j][i].split("|")[0],aryname[j][i].split("|")[1]); 
			}
		}else if(j == 222){
			for(var i=0; i<aryname[j].length; i++) {	
				addOption(obj,aryname[j][i].split("|")[0],aryname[j][i].split("|")[1]);
			}
		}else {$('#statesblock').hide();$('#countryTemp').html('');}
	}else {
		for (var i=0; i<aryname[j].length; i++) { 
		addOption(obj,aryname[j][i].split("|")[0],aryname[j][i].split("|")[1]); 
		}
	}
}
// Added by Jegadeesh on : 17-SEP-2012 : END

function checkHabits(formobj, habits, chkFl) {
	if(habits == 'eating'){HabitsCnt = 5;}else{HabitsCnt = 4;}
	var frmSrch=eval("this.document."+formobj);
	var chkBoxVal=eval("this.document."+formobj+"."+habits);
	if(chkFl == ''){
		allChk	= 0;
		OtherChk = 0;
		for(i=1; i<HabitsCnt; i++){
			if(chkBoxVal[i].checked==true){ 
				if(i==1){allChk=1;}
				OtherChk=1;
			}else{allChk=0;}
		}
		
		if(allChk ==1){
			chkBoxVal[0].checked=true;
			for(i=1; i<HabitsCnt; i++){
				chkBoxVal[i].checked=false;
			}
		}else if(OtherChk==1){
			chkBoxVal[0].checked=false;
		}
	}else{
		for(i=1; i<HabitsCnt; i++){
			if(chkBoxVal[i].checked){
				chkBoxVal[i].checked=false;
			}
		}
	}
}

// Added by Senthilnath on : 19-SEP-2012 : START (for Save Search)
function srchnameexists(argSrchName) {
	var SaveSrchCook = Decode_it(getCookie('savedSearchInfo'));
	var SrchCook = new Array();
	if(SaveSrchCook != null && SaveSrchCook != ''){
		SrchCook = SaveSrchCook.split('~');
	}
	var CookLen		 = SrchCook.length;
	var SrchNameExist = 'no';
	for(var i=0;i<CookLen;i++) {
		var CookInfo	= SrchCook[i].split('|');
		if(CookInfo[2] == argSrchName) { SrchNameExist = 'yes' ; }
	}
	srchSavedCnt = i;
	return SrchNameExist;
}

function multiple_save(formobj){
	var frmSrch	= eval('document.'+formobj);
	var saveSrchName = $('#saveName').val();
	var srchname;
	srchname = srchnameexists(saveSrchName);
	var objRegExp	= new RegExp("^[a-zA-Z0-9\\s]+$");
	if($('#saveName').val()=='' || saveSrchName =='Enter search name'){
		$("#saveerr").html("Please enter a name for your search.");
        $('#saveName').focus();
	}else if(srchname=='yes'){
		$("#saveerr").html("Name already exists. Please enter another name.");
		$('#saveName').focus();
	}else if(cook_id!='' && cook_paid=="0" && srchSavedCnt>=3 && srchname=='no'){
		$("#saveerr").html("A free member can save up to 3 searches only.");
	}else if(!objRegExp.test(saveSrchName)){
		$("#saveerr").html("The search name you have provided is invalid.");
	}else if(saveSrchName.length>14){
		$("#saveerr").html("A maximum of 14 characters only is permitted."); 
	}else{
		$('#saveSrch').val("yes");
		$('#searchName').val(saveSrchName);
		$("#saveerr").html("");
		//var redir_path=$('#redirectjspath').val();
		//frmSrch.action=redir_path+"?act="+$('#act').val()+"&randid="+ Math.random();
		//$("#"+formobj).submit();
		$.post('srchresult.php',$("#"+formobj).serialize(), function(data){//alert(data);
		   $('#saveName').focus();
			if(data=='You have reached the maximum number of count.'){
				 $.post('savedlist.php',{}, function(data){
					$('#savedlist').html(data);
				});
			}else{//if(data=='Successfully Saved.' || data=='Successfully Updated.'){
				 
				 if(data!='This search name already exists.'){
				 $('#savebtn').hide();
				  $('#saveName').hide();}
				 $('#saveerr').html(data);				
			}
	    });
	}
	
}

function save_search_box(boxdiv){	

	if($("#"+boxdiv).css("display")=='none')
		$("#"+boxdiv).css("display","block");
	else
		$("#"+boxdiv).css("display","none");
}
// Added by Senthilnath on : 19-SEP-2012 : END (for Save Search)


// Added by Sakthivel.S on : 29-SEP-2012 : START (for Save Search Delete)
function deleteSearch(srchId){
	saveSearchId = srchId;
	$('#savesearchaction').fadeIn();
	$('#savesearchresult').html('').hide();
	$('#search_id_del').val(srchId);
	showpopup('#savesearch_del');
}
function deleteSubmit(value){
	$.post('srchDelete.php',{'srchId':saveSearchId}, function(data){
	    $('#savesearchaction').hide();
	    $('#savesearchresult').fadeIn();
	    $('#savesearchresult').html(data);
	    $('#'+saveSearchId).remove();
		/*if(value=='savedlist'){
			 $.post('savedlist.php',{}, function(data){
					$('#savedlist').html(data);
			});
		}*/
	});
}
function showpopup(popupname) {
   $(popupname).bPopup({		
        position: ["auto","auto"], 
	followSpeed: 1500		
   });
}
// Added by Sakthivel.S on : 29-SEP-2012 : END (for Save Search  Delete)


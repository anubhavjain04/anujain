// JavaScript Document
function disableLoader(frm){
	frm.find(".error").removeClass("loader");
}
function enableLoader(frm){
	frm.find(".error").addClass("loader");
}
$(document).ready(function(e) {
	$(".text-top > a").click(function(){
		$(this).next("div").slideToggle();
	});
	$(".text-top > a").next("div").find(".close").click(function(){
		$(".text-top > a").next("div").slideToggle();
	});
    $(".hindifont").each(function(index, element) {
		var ele = $(element);
        var text = ele.text();
		ele.text(convert_to_unicode(text));
		ele.removeClass("hindifont").addClass("hindi");
    });
	
	if($.browser.chrome){
		/*var hi_unicodes = $(".hindi");
		hi_unicodes.each(function(index, element) {
            $(element).removeClass("hindi").addClass("hi");
        });*/
		//$(".hindi").removeClass("hindi").addClass("hi");
	}
	
	$("#loginForm").submit(function(e) {
        return false;
    });
	$("#loginfrm").click(function(e) {
		enableLoader($("#loginForm"));
		var btn = $(this);
		btn.attr("disabled",true);
		
        $.ajax({
			type: "POST",	 
			url: $("#loginForm").attr("action"),
			data: $("#loginForm").serialize(),
			success: function(msg) {				
				if($.trim(msg)=="success"){
					disableLoader($("#loginForm"));
					btn.attr("disabled",false);
					document.location.href = sitePath;
				}else{
					disableLoader($("#loginForm"));
					btn.attr("disabled",false);
					$("#loginForm .error").html(msg);
				}
			},
			error: function(msg){				
				disableLoader($("#loginForm"));
				btn.attr("disabled",false);
				$("#loginForm .error").html("error in login process, try after some time.");
			}
		});
    });
	
});
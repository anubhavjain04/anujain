var intervalObj = null;
function getAdvertisements(){
	$.ajax({
		type:"POST",
		url: sitePath+'advertisement/getAdvertisement.html',
		success: function(data){
			$("#adds").html(data);
		},
		error: function(data){
		}
	});
}
function getScreenAdvertisement(){
	// .01 = 20 minuts
	var cookieAdded = $.cookie("mainadv", 1, {"expires": .01});		
	$.ajax({
		type:"POST",
		url: sitePath+'advertisement/screenAdvertisement.html',
		success: function(data){
			$("#mainAdvData").html(data);
			if(data){
				$("#mainAdvertisement").dialog({
					dialogClass: "main_add",
					width: 700,
					resizable: false,
					draggable: false,
				    modal: true,
				    show: {
				       effect: "puff",
				       duration: 1000
				    },
				    hide: {
				       effect: "puff",
				       duration: 1000
				    }
				});
			}
		},
		error: function(data){
		}
	});
}

$(document).ready(function(){
	$('.slider')._TMS({
		playBu:'.play',
		preset:'diagonalFade',
		easing:'easeOutQuad',
		duration:1200,
		pagination:true,
		slideshow:6000
	});
	if($("#adds").length > 0){
		intervalObj = setInterval(function(){getAdvertisements()},10000);
		$("#adds").hover(function(e){
			if(intervalObj!=null){
				clearInterval(intervalObj);
			}
		},
		function(e){
			intervalObj = setInterval(function(){getAdvertisements()},10000);
		});
	}
	
	var advValue = $.cookie("mainadv");
	if(window.sessionStorage && !window.sessionStorage.getItem("screenAdd")){
		window.sessionStorage.setItem("screenAdd", 1); 
		getScreenAdvertisement();
	}else{
		if(!advValue){
			getScreenAdvertisement();
		}
	}
});

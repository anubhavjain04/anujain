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
		intervalObj = setInterval(function(){getAdvertisements()},5000);
		$("#adds").hover(function(e){
			if(intervalObj!=null){
				clearInterval(intervalObj);
			}
		},
		function(e){
			intervalObj = setInterval(function(){getAdvertisements()},5000);
		});
	}
	
});

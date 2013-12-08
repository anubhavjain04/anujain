// JavaScript Document
var timer1 = null;
var timer2 = null;
function animateScroll1(){	
	var	container = $("#forthcomingPrograms").find(".scroll-container");
	if(typeof container == undefined || container == null){
		return;
	}
					
	var firstItem = container.find(".scroll-item:first");
	var cloneItem = firstItem.clone();
	/*firstItem.animate({
		opacity: .15
	  }, 500, 'swing', function() {
		firstItem.animate({
			height: 0
		}, 500, 'swing', function() {		  
			firstItem.remove();
			container.find(".scroll-item:last").after(cloneItem.wrap("<div></div>").parent().html());						
			container.find(".scroll-item:last").fadeIn("slow");
		});  
	});*/
	
	firstItem.animate({
		opacity: .15,
		height: 0
	  }, 300, 'swing', function() {
		container.find(".scroll-item:last").after(cloneItem.wrap("<div></div>").parent().html());						
		container.find(".scroll-item:last").fadeIn("slow");  
		firstItem.remove();
	});
}


function animateScroll2(){	
	var	container = $("#recentPrograms").find(".scroll-container");
	if(typeof container == undefined || container == null){
		return;
	}
					
	var firstItem = container.find(".scroll-item:first");
	var cloneItem = firstItem.clone();
	firstItem.animate({
		opacity: .15,
		height: 0
	  }, 300, 'swing', function() {
		container.find(".scroll-item:last").after(cloneItem.wrap("<div></div>").parent().html());						
		container.find(".scroll-item:last").fadeIn("slow");
		firstItem.remove();
	});
}

function startTimer1(){
	timer1 = setInterval(animateScroll1,3000);
}

function stopTimer1(){
	if(timer1!=null)
		clearInterval(timer1);
}

function startTimer2(){
	timer2 = setInterval(animateScroll2,3000);
}

function stopTimer2(){
	if(timer2!=null)
		clearInterval(timer2);
}

function setMessageStyle(){	
	$("#footer_message .bottom-message").css("width",($(window).width())+"px");
}


$(document).ready(function(){
		startTimer1();
		$("#forthcomingPrograms").hover(function(){
				stopTimer1();
			},
			function(){
				startTimer1();
			}
		);
		
		startTimer2();
		$("#recentPrograms").hover(function(){
				stopTimer2();
			},
			function(){
				startTimer2();
			}
		);
			
		/********* jquery.marquee implementation*********************/
		setMessageStyle();
		$(window).resize(function(e) {
			setMessageStyle();
		});
	
		$('.marquee').marquee({
		    speed: 30000,
		    gap: 50,
		    delayBeforeStart: 0,
		    direction: 'left',
		    duplicated: true,
		    pauseOnHover: true
		});
});
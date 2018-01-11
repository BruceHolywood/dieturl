$( document ).ready(function() {
	if ($(".splash-head").hasClass("splash-head-success")) {
		$(".splash-head").hover(function(){
       		$(".splash-subhead").text("Click to visit!");
    	}, function(){
        	$(".splash-subhead").text("Your new URL is above!");
    	});
	};
});
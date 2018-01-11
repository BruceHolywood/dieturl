$( document ).ready(function() {
	if ($(".splash-head").hasClass("splash-head-success")) {
		
		//visit url on click
		$(".splash-head-success").on('click', function() {
    		window.open($(".splash-head-success").val());
		});


		//handle cursor swap and text change
		$(".splash-head-success").hover(function(){
       		$(".splash-subhead").text("Click to visit!");
    	}, function(){
        	$(".splash-subhead").text("Your new URL is above!");
    	});
	};
});
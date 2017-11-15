$(document).ready(function () {

	//Append a div with hover class to all the LI
	$('#navMenu li').append('<div class="hover"><\/div>');


	$('#navMenu li').hover(
		
		//Mouseover, fadeIn the hidden hover class	
		function() {
			
			$(this).children('div').stop(true, true).fadeIn('1000');	
		
		}, 
	
		//Mouseout, fadeOut the hover class
		function() {
		
			$(this).children('div').stop(true, true).fadeOut('1000');	
		
	}).click (function () {
	
		//Add selected class if user clicked on it
		$(this).addClass('selected');
		
	});

});
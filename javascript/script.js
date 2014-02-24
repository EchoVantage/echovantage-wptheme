document.createElement('header');
document.createElement('footer');
document.createElement('section');
document.createElement('article');
document.createElement('aside');
document.createElement('nav');


//allows use of $ symbol instead of writing jQuery
(function($) {

//Document Load
$(window).load(function() {
	//FLEXSLIDER 2 ================================================//	
	$('.flexslider').flexslider({
		animation: "fade",
		slideshowSpeed: 10000,           //Integer: Set the speed of the slideshow cycling, in milliseconds
		animationDuration: 1000,
	});
	
	//SMOOTH SCROLL ================================================//	
	$('a[href*=#]:not([href=#])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = $(this.hash);
			var offset = 125;
			
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			
			if (target.length) {
				$('html,body').animate({ scrollTop: target.offset().top - offset }, 500);
				return false;
			};
    	};
	}); //End Smooth Scroll

	
});



//Document Ready
$(document).ready(function() { 	

	//Image hover effects for blog
	$('#blog article section a').hover(function(){
		$(this).addClass('active');
		$(this).closest('section').siblings('a').children().addClass('active');
	},function(){
		$('.active').removeClass('active');
	});	

	//drop down menu for mobile
	$(".menu, .menu-links a").click(function(){
		var width = $(window).width();
		if ( width <= 535 ) {
			$('.menu-links').stop(true, true).slideToggle(500);
		};
		
	});
	

	
	$(window).resize(function() {
		$('.menu-links').css('display', 'block');
	});

	//MOBILE PRODUCT TITLE DISPLAYS ================================================//	 
	if ($('html').hasClass('touch')) {

	};




});








})( jQuery );
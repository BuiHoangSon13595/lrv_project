AOS.init();
$(document).ready(function() {
	$("#owl-banner").owlCarousel({
		items : 1,
		loop:true,
		autoplay:true,
		autoplayTimeout:3000,
		margin:0,
		nav:true,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:1
			},
			1000:{
				items:1
			}
		}
	});

	$('#owl-footer').owlCarousel({
		autoplay:true,
		autoplayTimeout:3000,
		loop:true,
		margin:0,
		nav:true,
		responsive:{
			0:{
				items:3
			},
			600:{
				items:3
			},
			1000:{
				items:5
			}
		}
	});

	$('header .menu a').hover(
		function() {
		  $( this ).addClass('animate__animated animate__swing');
		}, function() {
		  $( this ).removeClass('animate__animated animate__swing');
		}
	);

	$(window).scroll(function (event) {
		var h = $(window).scrollTop();
		if(h>500){
			$('header').addClass('navbar-fixed-top');
		}else{
			$('header').removeClass('navbar-fixed-top');
		}
	})
	
});






AOS.init();
$(document).ready(function() {
	$('#owl-brand').owlCarousel({
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
				items:6
			},
			1000:{
				items:6
			}
		}
	});
});

var starRatingControl = new StarRating('.star-rating',{
	showText: false
});


$('legend').hover(
	function() {
	  $( this ).addClass('animate__animated animate__heartBeat');
	}, function() {
	  $( this ).removeClass('animate__animated animate__heartBeat');
	}
  );

  $('.pagination a').unbind('click').on('click', function(e) {
	e.preventDefault();
	var page = $(this).attr('href').split('page=')[1];
	getPosts(page);
});

function getPosts(page) {
	$.ajax({
		type: "GET",
		url: '?page=' + page,
		success: function(data) {
			$('body').html(data);
		}
	})
}

$(document).ready(function() {
var countDownDate = new Date("August 25, 2020 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
  
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
  
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  
  // Output the result in an element with id="demo"
  document.getElementById("day").innerHTML = days ;
  document.getElementById("hour").innerHTML = hours ;
  document.getElementById("minute").innerHTML = minutes ;
  document.getElementById("second").innerHTML = seconds ;
  
  // If the count down is over, write some text 
  if (distance < 0) {
  	clearInterval(x);
  	document.getElementById("day").innerHTML = "EXPIRED";
  	clearInterval(x);
  	document.getElementById("hour").innerHTML = "EXPIRED";
  	clearInterval(x);
  	document.getElementById("minute").innerHTML = "EXPIRED";
  	clearInterval(x);
  	document.getElementById("second").innerHTML = "EXPIRED";
  }
}, 1000);

var starRatingControl = new StarRating('.star-rating',{
	showText: false
});

$('input.input-qty').each(function () {
	var $this = $(this),
		qty = $this.parent().find('.is-form'),
		min = Number($this.attr('min')),
		max = Number($this.attr('max'))
	if (min == 0) {
		var d = 0
	} else d = min
	$(qty).on('click', function () {
		if ($(this).hasClass('minus')) {
			if (d > min) d += -1
		} else if ($(this).hasClass('plus')) {
			var x = Number($this.val()) + 1
			if (x <= max) d += 1
		}
		$this.attr('value', d).val(d)
	})
})
$('.owl-modal').owlCarousel({
	autoplay:true,
	autoplayTimeout:3000,
	loop:true,
	margin:10,
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
});

$('.star-rating').prop('disabled', true);


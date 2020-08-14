$(document).ready(function() {
var starRatingControl = new StarRating('.star-rating', {
	showText: false
});
$('#owl-product').owlCarousel({
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
});
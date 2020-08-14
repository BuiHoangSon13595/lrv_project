$('input.input-qty').each(function () {
	var $this = $(this),
		qty = $this.parent().find('.is-form'),
		min = Number($this.attr('min')),
		max = Number($this.attr('max'))
	if (min == 0) {
		var d = 0
	} else d = $this.val();
	$(qty).on('click', function () {
		if ($(this).hasClass('minus')) {
			if (d > min) {
				d = parseFloat(d) + -1;
			}
		} else if ($(this).hasClass('plus')) {
			var x = Number($this.val()) + 1
			if (x <= max) {
				d = parseFloat(d) + 1;
			}
		}
		$this.attr('value', d).val(d)
	})
})

$('.but').hover(
	function() {
	  $( this ).addClass('animate__animated animate__tada');
	}, function() {
	  $( this ).removeClass('animate__animated animate__tada');
	}
  );

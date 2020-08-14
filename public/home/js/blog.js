
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


$('.blog-main .letter .content form .btn').hover(
	function() {
	  $( this ).addClass('animate__animated animate__jello');
	}, function() {
	  $( this ).removeClass('animate__animated animate__jello');
	}
);
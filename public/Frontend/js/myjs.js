// $(document).ready(function () {
//   var maxH = 0;
//   $('#footer div h3').each(function () {
//       if ($(this).height() > maxH) {
//         maxH = $(this).height();
//       }
//   });

//   $('#footer div h3').height(maxH);

// });

$(document).ready(function () {
	var maxH = 110;
	$('.button-icon-nav').click(function () {
		$('.nav-bar-ul').toggle();
		// $('body').append('<div class="modal-backdrop fade in"></div>');
	});

	$('.content-lq').each(function () {
		var h = $(this).height();
		
	});

	$(window).resize(function() {
	    if(window.innerWidth >= 768){
	    	$('.nav-bar-ul').show();
	    }  
	});
	if ($('.go-up a').length) {
	    var scrollTrigger = 200, // px
        backToTop = function () {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                $('.go-up a').addClass('show');
            } else {
                $('.go-up a').removeClass('show');
            }
        };
	    backToTop();
	    $(window).on('scroll', function () {
	        backToTop();
	    });
	    $('.go-up a').on('click', function (e) {
	        e.preventDefault();
	        $('html,body').animate({
	            scrollTop: 0
	        }, 600);
	    });
	}
});

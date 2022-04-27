// Add your custom JS here.

jQuery(function($){
	var header = $("#wrapper-navbar");
	$(window).scroll(function() {    
        var scroll = $(window).scrollTop();
        if (scroll >= 100) {
            header.addClass("scrolled");
        } else {
            header.removeClass("scrolled");
        }
    });

	$('a').click(function(){
	    $('html, body').animate({
	        scrollTop: $( $(this).attr('href') ).offset().top
	    }, 500);
	    return false;
	});

});
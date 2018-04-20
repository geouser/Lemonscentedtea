// Document Events
jQuery(document).ready(function($) {

	// hamburger menu
	$(".hamburger").on("click", function(e) {
	    $(this).toggleClass("is-active");
	    $(".background-block-menu").toggleClass("menu-open");
	    $("body").toggleClass("body-fixed");

	    var $target = $('#menu-main-menu >li ');
		var hold = 200;
		$.fn.reverse = [].reverse;

		if ( $(".background-block-menu").hasClass("menu-open")){
			$.each($target,function(i,t){
			     var $this = $(t);
			     setTimeout(function(){ $this.addClass('list-menu-visible') },i*hold);
			     setTimeout(function(){ $(".background-block-menu").addClass('scroll') },800);
			});
		} else {
			$($target.get().reverse()).each(function(i,t){
			     var $this = $(t);
			     setTimeout(function(){ $this.removeClass('list-menu-visible') },i*hold);
			     setTimeout(function(){ $(".background-block-menu").removeClass('scroll') },800);
			});
		}
	});

	$('input#email').keyup(function () {
	    var $email = this.value;
	    validateEmail($email);
	});

	function validateEmail(email) {
	    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	    console.log(email);
	    if (!emailReg.test(email)) {
	        $("#form_subcribe").addClass("error");
	        $("#form_subcribe").removeClass("success");
	    } else if(email=='') {
	    	$("#form_subcribe").removeClass("success");
	    	$("#form_subcribe").removeClass("error");
	    }else {
	        $("#form_subcribe").addClass("success");
	        $("#form_subcribe").removeClass("error");
	    }
	}

	var windowH = $(window).height();
	var headerH = $(".mainheader").height();
	console.log(headerH);
	if( $(".slider-container").length != 0){
		$("#main #carousel .carousel-inner > .item").css("height", windowH - headerH - 100);
	}

	$('#carousel').carousel({
        interval: 5000
    });

    $('#carousel-example-generic').bind('slid.bs.carousel', function (e) {
        //$(e.relatedTarget).find('.slider-description').addClass('slide-effect');
        console.log(e);
        console.log("asdas");
    });

    console.log("sadasd");
    $(".carousel").swipe({
        swipe: function(event, direction, distance, duration, fingerCount, fingerData) {
            if (direction == 'left') $(this).carousel('next');
            if (direction == 'right') $(this).carousel('prev');
        },
        allowPageScroll:"vertical"
    });

});

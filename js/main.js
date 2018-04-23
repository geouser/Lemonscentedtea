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

	$('input#email').on('change', function(event) {
		event.preventDefault();
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




    /*---------------------------
                                  Fancybox
    ---------------------------*/
    $('.fancybox').fancybox({
        
    });


    /**
     *
     * Open popup
     *
     * @param popup {String} jQuery object (#popup)
     *
     * @return n/a
     *
    */
    function openPopup(popup){
        $.fancybox.open([
            {
                src  : popup,
                type: 'inline',
                opts : {}
            }
        ], {
            loop : false
        });
    }


    $('.hero-slider').slick({
    	arrows: false,
    	fade: true,
    	dots: true,
    	customPaging : function(slider, i) {
	        return '<svg class="slick-triangle" x="0px" y="0px" viewBox="0 0 14 30" width="14" height="30" style="enable-background:new 0 0 14 30;" xml:space="preserve"><polygon class="st0" points="0.8,1.9 13,15.1 0.8,28.1 	"/><path class="st1" d="M1.5,3.8l2.2,2.4l8.3,8.9L1.5,26.2V3.8 M0,0c0,10,0,20,0,30l14-14.9C9.3,10.1,4.7,5,0,0L0,0z"/></svg>';
	    },
    })

});

// Document Events
jQuery(document).ready(function($) {

	// hamburger menu
	$(".hamburger").on("click", function(e) {
	    $(this).toggleClass("is-active");
	    $(".background-block-menu").toggleClass("menu-open");
	    $("body").toggleClass("body-fixed");

	    var $target = $('#menu-main-menu >li ');
		var hold = 100;
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

	/*---------------------------
                                  ADD CLASS ON SCROLL
    ---------------------------*/
    $(function () {
        var $document = $(document),
            $element = $('.background-block-menu')
            className = 'fixed';

        $document.scroll(function () {
			$element.toggleClass(className, $document.scrollTop() >= 0);
			if ( $document.scrollTop() == 0) {
				$element.removeClass(className);
			}
		});
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
		autoplay: true,
		autoplaySpeed: 4000,
		speed: 900,
		pauseOnHover: false,
    	customPaging : function(slider, i) {
	        return '<svg class="slick-triangle" x="0px" y="0px" viewBox="0 0 14 30" width="14" height="30" style="enable-background:new 0 0 14 30;" xml:space="preserve"><polygon class="st0" points="0.8,1.9 13,15.1 0.8,28.1 	"/><path class="st1" d="M1.5,3.8l2.2,2.4l8.3,8.9L1.5,26.2V3.8 M0,0c0,10,0,20,0,30l14-14.9C9.3,10.1,4.7,5,0,0L0,0z"/></svg>';
	    },
    })

});

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
                                  Form validation
    ---------------------------*/
    // keyup event
    var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    $('.subscribe-form input').on( "keyup", function(e){
        var value = $(this).val(),
            form = $(this).closest('form');
        
        form.addClass('typing');
        form.removeClass('not-valid');

        if (testEmail.test(value) ) {
            form.addClass('valid');
        } else {
            form.removeClass('valid');
        }

        if (e.keyCode === 13)  {
            form.removeClass('typing');
            if (testEmail.test(value) ) {
                form.addClass('valid');
            } else {
                form.removeClass('valid');
                form.addClass('not-valid');
            }
        }
    } )
    // blur
    $('.subscribe-form input').on( "blur", function(){
        $(this).closest('form').removeClass('typing valid not-valid');
    } )
    // form submit
    $('.subscribe-form').submit(function(event){
        event.preventDefault();
        var value = $(this).find('input').val();

        if (testEmail.test(value) ) {
            // console.log('submit');
        } else {
            $(this).removeClass('typing');
            $(this).addClass('not-valid');
        }
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



    var states = {
        empty: '0,0 0,0 0,30 0,30',
        full: '0,0 14,15 14,15 0,30'
    }

    $('.hero-slider').on('init', function( event, slick ){
        
        setTimeout( function(){
            
            var dot = slick.$dots.find('li').eq( 0 )

            dot.find('animate')[0].beginElement();

        }, slick.options.speed/2 )
    });

    $('.hero-slider').slick({
    	arrows: false,
    	fade: true,
		dots: true,
		autoplay: true,
		autoplaySpeed: 4000,
		speed: 900,
		pauseOnHover: false,
        customPaging: function (i) {
            return  '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 14 30" style="enable-background:new 0 0 14 30;" xml:space="preserve">' +
                        '<g>' +
                            '<polygon class="fill" points="0,0 14,15 14,15 0,30">' +
                                '<animate class="animate-fill" begin="indefinite" attributeName="points" dur="4450ms" from="0,0 0,0 0,30 0,30" to="0,0 14,15 14,15 0,30" />' +
                                '<animate class="animate-back" begin="indefinite" attributeName="points" dur="450ms" from="0,0 14,15 14,15 0,30" to="0,0 0,0 0,30 0,30" />' +
                                '<animate class="animate-reset" begin="indefinite" attributeName="points" dur="5ms" from="0,0 0,0 0,30 0,30" to="0,0 14,15 14,15 0,30" />' +
                            '</polygon>' +
                            '<path class="border" d="M1.5,3.8L11.9,15L1.5,26.2V3.8 M0,0v30l14-15L0,0L0,0z"/>' +
                        '</g>' +
                    '</svg>';
        },
    })

    // On before slide change
    $('.hero-slider').on('beforeChange', function(event, slick, currentSlide, nextSlide){

        slick.$dots.find('li').eq( currentSlide ).find('.animate-reset')[0].beginElement();
        slick.$dots.find('li').eq( currentSlide ).find('.animate-fill')[0].endElement();
        slick.$dots.find('li').eq( nextSlide ).find('.animate-back')[0].beginElement();

        setTimeout( function(){

            slick.$dots.find('li').eq( nextSlide ).find('.animate-fill')[0].beginElement();

        }, slick.options.speed/2 )

    });






    $('.gallery-slider').slick({
    	arrows: true,
    	fade: false,
        dots: false,
        autoplay: true,
        autoplaySpeed: 4000,
        speed: 900,
        pauseOnHover: false,
    })

});

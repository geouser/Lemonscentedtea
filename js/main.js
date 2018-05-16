// Document Events
jQuery(document).ready(function ($) {

    var img_width = 'full',
        win_width = $(window).width();

    if (win_width <= 1600) {
        img_width = '1600'
    }
    if (win_width <= 1100) {
        img_width = '1100'
    }
    if (win_width <= 800) {
        img_width = '800'
    }
    if (win_width <= 500) {
        img_width = '500'
    }


    function fix_page_height() {
        $('#main').css('min-height', $(window).height() - ($('.mainheader').outerHeight() + $('#footer').outerHeight()));
    }

    if ($('#main').length > 0) {
        fix_page_height();
        $(window).on('resize', function (event) {
            event.preventDefault();
            fix_page_height();
        });
    }



    // hamburger menu
    $(".hamburger").on("click", function (e) {
        $(this).toggleClass("is-active");
        $(".background-block-menu").toggleClass("menu-open");
        $("body").toggleClass("body-fixed");

        var $target = $('.main_menu >li ');
        var hold = 60;
        $.fn.reverse = [].reverse;

        if ($(".background-block-menu").hasClass("menu-open")) {
            $.each($target, function (i, t) {
                var $this = $(t);
                setTimeout(function () { $this.addClass('list-menu-visible') }, i * hold);
                setTimeout(function () { $(".background-block-menu").addClass('scroll') }, 800);
            });
        } else {
            $($target.get().reverse()).each(function (i, t) {
                var $this = $(t);
                setTimeout(function () { $this.removeClass('list-menu-visible') }, i * hold);
                setTimeout(function () { $(".background-block-menu").removeClass('scroll') }, 800);
            });
        }
    });

    $(document).on('click', function () {
        $(".background-block-menu").removeClass("menu-open");
        $("body").removeClass("body-fixed");
        $(".hamburger").removeClass("is-active");
        $('.main_menu >li ').removeClass('list-menu-visible')
    });
    $(".background-block-menu, .hamburger").click(function (event) {
        event.stopPropagation();
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
            if ($document.scrollTop() == 0) {
                $element.removeClass(className);
            }
        });
    });

    /*---------------------------
                                  Form validation
    ---------------------------*/
    // keyup event
    var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    $('.mailchimp-form input').on("keyup", function (e) {
        var value = $(this).val(),
            form = $(this).closest('form');

        form.addClass('typing');
        form.removeClass('not-valid');
    })
    // blur
    $('.mailchimp-form input').on("blur", function () {
        $(this).closest('form').removeClass('typing valid not-valid');
    })


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
    function openPopup(popup) {
        $.fancybox.open([
            {
                src: popup,
                type: 'inline',
                opts: {}
            }
        ], {
                loop: false
            });
    }



    var states = {
        empty: '0,0 0,0 0,30 0,30',
        full: '0,0 14,15 14,15 0,30'
    }

    $('.hero-slider').on('init', function (event, slick) {

        var item = slick.$dots.find('li').eq(0).find('.animate-fill')[0];

        if ('beginElement' in item) {
            item.beginElement();
        }

    });

    $('.hero-slider .slide').each(function(){
        var image = $(this).find('img');
        if (win_width <= 1100) {
            neededSize = image.data('1600')
            image.attr('data-lazy', neededSize);
        }
        if (win_width <= 400) {
            neededSize = image.data('800')
            image.attr('data-lazy', neededSize);
        }
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
            return '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 14 30" style="enable-background:new 0 0 14 30;" xml:space="preserve">' +
                '<g>' +
                '<polygon class="permanent-fill" points="0,0 14,15 14,15 0,30"/>' +
                '<polygon class="fill" points="0,0 14,15 14,15 0,30">' +
                '<animate class="animate-fill" begin="indefinite" attributeName="points" dur="4900ms" from="0,0 0,0 0,30 0,30" to="0,0 14,15 14,15 0,30" />' +
                '<animate class="animate-back" begin="indefinite" attributeName="points" dur="5ms" from="0,0 14,15 14,15 0,30" to="0,0 0,0 0,30 0,30" />' +
                '</polygon>' +
                '<path class="border" d="M1.5,3.8L11.9,15L1.5,26.2V3.8 M0,0v30l14-15L0,0L0,0z"/>' +
                '</g>' +
                '</svg>';
        },
    }).slick("slickPause");

    setTimeout(function() {
        $('.hero-slider').slick("slickPlay");
        $('.hero-slider').addClass('first-start');
    },1500);

    // On before slide change
    $('.hero-slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {

        var item1 = slick.$dots.find('li').eq(nextSlide).find('.animate-back')[0];
        var item2 = slick.$dots.find('li').eq(nextSlide).find('.animate-fill')[0];

        if ('beginElement' in item1) {
            item1.beginElement();
            item2.beginElement();
        }

    });
    


    $('.gallery-slider .gallery-slider__slide').each(function( index, value ){
        var image = $(this).find('img'),
            neededSize = image.data(img_width);

        var width = $(this).attr('data-width');
        var height = $(this).attr('data-height');
        var ratio = height / width;
        
        $(this).css('height', $(window).width() * ratio );

        if ( index == 0 ) {
            image.attr('src', neededSize);
        } else {
            image.attr('data-lazy', neededSize);
        }
    });


    $('.gallery-slider').slick({
        arrows: true,
        fade: true,
        dots: false,
        autoplay: true,
        autoplaySpeed: 4000,
        speed: 900,
        pauseOnHover: false,
        lazyLoad: 'ondemand',
        adaptiveHeight: true
    });

    // On before slide change
    $('.gallery-slider').on('lazyLoaded', function(event, slick, image, imageSource){
        slick.$slider.addClass('loaded');

        slick.$slides.each(function(index, el) {
            $(this).css('height', 'auto');
        });
    });





    // load more cases
    $('.js-load-cases').click(function () {

        var button = $(this),
            data = {
                'action': 'loadmorecases',
                'query': theme.posts,
                'page': theme.current_page
            };

        $.ajax({
            url: theme.ajax_url, // AJAX handler
            data: data,
            type: 'POST',
            beforeSend: function (xhr) {
                button.addClass('loading'); // change the button text, you can also add a preloader image
            },
            success: function (data) {
                if (data) {
                    console.log($(data));
                    createWaypoints($(data));
                    $(data).hide().appendTo('.cases-container')
                        .css('opacity', 0)
                        .slideDown('fast')
                        .animate(
                            { opacity: 1 },
                            { queue: false, duration: 'slow' }
                        );

                    theme.current_page++;
                    if (theme.current_page >= theme.max_page) {
                        setTimeout(function () { 
                            button.remove();
                        }, 800);
                    } else {
                        setTimeout(function () { 
                            button.removeClass('loading'); 
                        }, 800);
                    }

                } else {
                    button.remove();
                }
            }
        });
    });



    // load more workers
    $('.js-load-team').click(function () {

        var button = $(this),
            data = {
                'action': 'loadmorelemons',
                'q': team
            };


        $.ajax({
            url: theme.ajax_url, // AJAX handler
            data: data,
            type: 'POST',
            beforeSend: function (xhr) {
                button.addClass('loading'); // change the button text, you can also add a preloader image
            },
            success : function( data ){

                if (data) {
                    $(data).hide().appendTo('.team-container').fadeIn();

                    team.paged++;

                    /*if (team.paged >= team.max_pages) {
                        setTimeout(function () {
                            button.remove();
                        }, 400);
                    } else {
                        setTimeout(function () {
                            button.removeClass('loading');
                        }, 400);
                    }*/
                    setTimeout(function () {
                        button.remove();
                    }, 400);

                } else {
                    button.remove();
                }
            }
        });
    });





    $('.js-load-clients').on('click', function (event) {
        event.preventDefault();

        var hidden_clients = $('.clients').find('.client-col.hidden');

        hidden_clients.fadeIn('1000', function () {
            $(this).removeClass('hidden');
        });

        $(this).remove();

    });




    $('.js-mailchimp-form').each(function (index, el) {
        var form = $(this);

        if (theme.mailchimp_url !== null) {
            form.ajaxChimp({
                url: theme.mailchimp_url,
                callback: function (result) {

                    form.removeClass('not-valid valid typing');

                    if (result.result == 'error') {
                        form.addClass('not-valid');
                    } else {
                        form.addClass('valid');
                    }
                }
            });
        } else {
            var alert = $('<div class="alert alert-danger">Please, provide correnct subscribe url in your theme settings.</div>');

            form.find('.alerts').html('').append(alert);
        }



    });

    // create cases Waypoints after AJAX
    var createWaypoints = function(elements) {
        elements.each(function () {
            var self = $(this).find('.case__cover'),
            small = self.find('.img-small');

            $(this).waypoint({
                handler: function () {
                    // 2: load large image
                    var imgLarge = new Image();
                    if (win_width <= 800) {
                        imgLarge.src = self.data('800');
                    } else {
                        imgLarge.src = self.data('full');
                    }
                    imgLarge.onload = function () {
                        imgLarge.classList.add('loaded');
                        setTimeout(function(){ small.addClass('hide'); }, 700);
                    };
                    self.append(imgLarge);
                    this.destroy()
                },
                offset: '60%'
            });
        })
    }

    var insertEl = function(el, child){
        el.append(child);
    }

    // Lazy load images
    var figure = $('.placeholder').not(".loaded");
    figure.each(function () {

        var self = $(this),
            small = self.find('.img-small');

        // 1: load small image and show it
        var img = new Image();
        img.src = small.attr('src');
        img.onload = function () {
            small.addClass('loaded');
        };

        $(this).waypoint({
            handler: function () {
                // 2: load large image
                var imgLarge = new Image();
                imgLarge.src = self.data(img_width);
                imgLarge.onload = function () {
                    imgLarge.classList.add('loaded');
                    setTimeout(function(){ small.addClass('hide'); }, 700);
                };
                self.append(imgLarge);
                this.destroy()
            },
            offset: '60%'
        });
    })

    // Lazy load cases
    var cases = $('.case');
    createWaypoints(cases);

    // Lazy load vimeo video
    var video = $('.vimeo-video');
    video.each(function () {

        var self = $(this),
            self_id = self.attr('id'),
            video_id = self.data('id');

        $(this).waypoint({
            handler: function () {
                var options = {
                    id: video_id,
                    loop: true
                };
            
                var player = new Vimeo.Player(self_id, options);
                setTimeout(function(){ 
                    self.addClass('show-video'); 
                    self.find('.vimeo-video__preview').addClass('hide');
                }, 700);
            },
            offset: '60%'
        });
    })

});

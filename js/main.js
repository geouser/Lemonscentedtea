// Document Events
jQuery(document).ready(function ($) {


    function fix_page_height() {
        $('#main').css('min-height', $(window).height() - ($('.mainheader').outerHeight() + $('#footer').outerHeight()));
    }
    fix_page_height();
    $(window).on('resize', function (event) {
        event.preventDefault();
        fix_page_height();
    });


    // hamburger menu
    $(".hamburger").on("click", function (e) {
        $(this).toggleClass("is-active");
        $(".background-block-menu").toggleClass("menu-open");
        $("body").toggleClass("body-fixed");

        var $target = $('.main_menu >li ');
        var hold = 100;
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

        if (testEmail.test(value)) {
            form.addClass('valid');
        } else {
            form.removeClass('valid');
        }

        if (e.keyCode === 13) {
            form.removeClass('typing');
            if (testEmail.test(value)) {
                form.addClass('valid');
            } else {
                form.removeClass('valid');
                form.addClass('not-valid');
            }
        }
    })
    // blur
    $('.mailchimp-form input').on("blur", function () {
        $(this).closest('form').removeClass('typing valid not-valid');
    })
    // form submit
    $('.mailchimp-form').submit(function (event) {
        event.preventDefault();
        var value = $(this).find('input').val();

        if (testEmail.test(value)) {
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

        slick.$dots.find('li').eq(0).find('.animate-fill')[0].beginElement();

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
    })

    // On before slide change
    $('.hero-slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {

        slick.$dots.find('li').eq(nextSlide).find('.animate-back')[0].beginElement();
        slick.$dots.find('li').eq(nextSlide).find('.animate-fill')[0].beginElement();

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
                    $(data).hide().appendTo('.cases-container')
                        .css('opacity', 0)
                        .slideDown('fast')
                        .animate(
                            { opacity: 1 },
                            { queue: false, duration: 'slow' }
                        );

                    theme.current_page++;
                    console.log(theme.current_page);
                    console.log(theme.max_page);
                    if (theme.current_page >= theme.max_page) {
                        setTimeout(function () { button.addClass('disabled'); }, 800);
                    } else {
                        setTimeout(function () { button.removeClass('loading'); }, 800);
                    }

                } else {
                    button.addClass('disabled'); // if no data, remove the button as well
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
            success: function (data) {
                if (data) {
                    $(data).hide().appendTo('.team-container')
                        .css('opacity', 0)
                        .slideDown('fast')
                        .animate(
                            { opacity: 1 },
                            { queue: false, duration: 'slow' }
                        );

                    team.paged++;

                    if (team.paged >= team.max_pages) {
                        setTimeout(function () {
                            button.addClass('disabled');
                        }, 400);
                    } else {
                        setTimeout(function () {
                            button.removeClass('loading');
                        }, 400);
                    }

                } else {
                    button.addClass('disabled'); // if no data, remove the button as well
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

        $(this).addClass('disabled');

    });


    console.log($.ajaxChimp.responses);




    function translate_message(str, lang) {

        if (~str.indexOf("Please enter a value")) {
            return messages[0][lang];
        } else if (~str.indexOf("An email address must contain a single @")) {
            return messages[1][lang];
        } else if (~str.indexOf("The domain portion of the email address is invalid (the portion after the @:")) {
            return str.replace('The domain portion of the email address is invalid (the portion after the @:', messages[2][lang]);
        } else if (~str.indexOf("The username portion of the email address is empty")) {
            return messages[3][lang];
        } else if (~str.indexOf("Thank you for subscribing!")) {
            return messages[4][lang];
        } else if (~str.indexOf("is already subscribed to list")) {
            str = str.replace('is already subscribed to list', messages[5][lang][0]);
            str = str.replace('Click here to update your profile', messages[5][lang][1]);
            return str;
        }

    }


    $('.js-mailchimp-form').each(function (index, el) {
        var form = $(this);

        console.log(theme.mailchimp_url);

        if (theme.mailchimp_url !== null) {
            form.ajaxChimp({
                url: theme.mailchimp_url,
                language: 'de',
                callback: function (result) {

                    form.find('input').removeClass('error');

                    var inputs = ['EMAIL'];

                    var info = result.msg.split(' - ');


                    if (result.result == 'error') {
                        var message = info[1]

                        if (!message) {
                            message = info[0];
                        }

                        message = translate_message(message, theme.lang);


                        form.find('input[name=' + inputs[info[0]] + ']').addClass('error');
                        var alert = $('<div class="alert alert-danger" style="display: none;">' + message + '</div>');

                        form.find('.alerts').html('').append(alert);
                        alert.fadeIn(500, function () {
                            setTimeout(function () {
                                alert.fadeOut(500);
                            }, 5000)
                        });
                    } else {
                        var message = info[1]

                        if (!message) {
                            message = info[0];
                        }

                        message = translate_message(message, theme.lang);

                        var alert = $('<div class="alert alert-success" style="display: none;">' + message + '</div>');

                        form.find('.alerts').html('').append(alert);
                        form.removeClass('not-valid valid typing');
                        alert.fadeIn(500, function () {
                            setTimeout(function () {
                                alert.fadeOut(500);
                            }, 5000)
                        });

                        form[0].reset();
                    }
                }
            });
        } else {
            var alert = $('<div class="alert alert-danger">Please, provide correnct subscribe url in your theme settings.</div>');

            form.find('.alerts').html('').append(alert);
        }



    });



    var figure = $('.placeholder');
    figure.each(function () {

        var self = $(this);
        var small = self.find('.img-small');

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
                imgLarge.src = self.data('large');
                imgLarge.onload = function () {
                    imgLarge.classList.add('loaded');
                };
                self.append(imgLarge);
            }, 
            offset: '50%'
        });
    })

});

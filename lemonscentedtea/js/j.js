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
	
	// Slider Inits
	jQuery('.multiple-slider .slider').on('changed.owl.carousel initialized.owl.carousel', function(event) {
		jQuery(event.target).find('.owl-item').removeClass("last").removeClass("first")
		jQuery(event.target).find('.owl-item').eq(event.item.index + event.page.size - 1).addClass("last")
		jQuery(event.target).find('.owl-item').eq(event.item.index + event.page.size - event.page.size).addClass("first")
	}).owlCarousel({
		loop: false,
		margin: 1,
		nav: false,
		dots: false,
		navContainer: '#multiple-slider-arrows',
		responsive: {
			0: {
				items: 1
			},
			700: {
				items: 2
			},
			1100: {
				items: 3
			}
		}
	})
	jQuery('.single-slider .slider').owlCarousel({
			loop: false,
			nav: false,
			items: 1,
			dots: false,
			navContainer: '#single-slider-arrows',
		})

		jQuery(".blocklink").click(function () {
				window.location = jQuery(this).find("a.link").attr("href");
				return false;
		});

		// Header inits
	header_top_content = jQuery(".header .top").html()
	jQuery(".search-overlay, .menu-overlay").prepend('<div class="header"><div class="top fixed">' + header_top_content + '</div></div>')
	jQuery(".search-overlay").find(".header .right").html("")
	jQuery(".search-overlay .btn").clone().prependTo(".search-overlay .right")
	jQuery(".search-overlay > .btn").remove()

	// Tabs Width Arrangement
	jQuery(".tabs .titles").each(function(index, element) {
		var l = jQuery("li",this).length
        jQuery("li",this).each(function(index, element) {
            jQuery(this).width(100/l+"%")
        });
    });

	check_team_grid();

	// Contact form underline animation

	if(jQuery("form .field").length) {

		jQuery("form .field").find('input, textarea').not('.error').focus(function(){
				jQuery(this).parent().parent().find('.underline').css({'width':'100%'});
			}).blur(function(){
				jQuery(this).parent().parent().find('.underline').css({'width':'0'});
			});

		jQuery("form .field").find('input, textarea').on('submit', function() {
			console.log(jQuery(this));
			jQuery(this).not('.error').focus(function(){
				jQuery(this).parent().parent().find('.underline').css({'width':'100%'});
			}).blur(function(){
				jQuery(this).parent().parent().find('.underline').css({'width':'0'});
			});
		});
	}




	function checkReadingTime() {
		jQuery('article').each(function() {
			jQuery(this).readingTime({
				readingTimeTarget: jQuery(this).find('.eta'),
				remotePath: jQuery(this).attr('data-file'),
				remoteTarget: jQuery(this).attr('data-target'),
				lang: 'nl',
				success: function() {
				},
				error: function(message) {
					console.log(message);
					jQuery(this).find('.eta').remove();
				}
			});
		});
	}
	checkReadingTime();
});


// Resize events

jQuery(window).resize(function(e) {
    check_team_grid();
});

// Fluid Tabs
jQuery.organicTabs = function(el, options) {

    var base = this;
    base.$el = jQuery(el);
    base.$nav = base.$el.find(".titles");

    base.init = function() {

        base.options = jQuery.extend({},jQuery.organicTabs.defaultOptions, options);

        // Accessible hiding fix
        jQuery(".tabs .content li").not('.active').css({
            "position": "relative",
            "top": 0,
            "left": 0,
            "display": "none"
        });

        base.$nav.delegate("li", "click", function() {

            // Figure out current list via CSS class
            var curList = base.$el.find("li.active").data("content"),

            // List moving to
                $newList = jQuery(this),

            // Figure out ID of new list
                listID = $newList.data("content"),

            // Set outer wrapper height to (static) height of current inner list
                $allListWrap = base.$el.find(".content"),
                curListHeight = $allListWrap.height();

            $allListWrap.height(curListHeight);

            if ((listID != curList) && ( base.$el.find(":animated").length == 0)) {

                // Fade out current list
                base.$el.find("li[data-title="+curList+"]").fadeOut(base.options.speed, function() {

                    // Fade in new list on callback
                    base.$el.find("li[data-title="+listID+"]").fadeIn(base.options.speed);

                    // Adjust outer wrapper to fit new list snuggly
                    var newHeight = base.$el.find("li[data-title="+listID+"]").height();
                    $allListWrap.animate({
                        height: newHeight
                    });

                    // Remove highlighting - Add to just-clicked tab
                    base.$el.find(".titles li").removeClass("active");
                    $newList.addClass("active");

                });

            }

            // Don't behave like a regular link
            // Stop propegation and bubbling
            return false;
        });

    };
    base.init();
};

jQuery.organicTabs.defaultOptions = {
    "speed": 250
};

jQuery.fn.organicTabs = function(options) {
    return this.each(function() {
        (new jQuery.organicTabs(this, options));
    });
};

jQuery(".tabs").organicTabs();



// Click Functions
var menu_opened = 0;
var searchresults_opened = 0;
jQuery(document).on('click', '.all-services', function(e) {
	e.preventDefault();
 TweenLite.to(window, 1, {scrollTo: {y:0},ease: Power3.easeOut, onComplete: function(){
	 if (menu_opened == 0) menu_anim_func(true)
 		else menu_anim_func(false)
 }})
});
jQuery(document).on('click', '.header .btn.menu', function() {
	 if (menu_opened == 0) menu_anim_func(true)
 		else menu_anim_func(false)
});
jQuery(document).on('click', '.header .btn.search', function() {
	jQuery('.search-overlay form input').val("").focus();
	search_anim_function(true);
});
jQuery(document).on('click', '.header .btn.close', function() {
	if(searchresults_opened == 1) {
		jQuery('.search-overlay form input').blur();
		search_anim_results_function(false);
		searchresults_opened = 0;
	} else {
		search_anim_function(false);
	}
});
jQuery(document).on('click', '#footer .scroll-up', function() {
	 TweenLite.to(window, 2, {scrollTo: {y:0},ease: Power3.easeOut})
});
jQuery(document).on('click', '.scroll-down', function() {
	 data_end_of = jQuery(this).attr("data-end-of");
	 distance = 0;

	 if(data_end_of == null){
		 distance = jQuery(this).height() + jQuery(this).offset().top
	}
	else{
		distance = jQuery("." + data_end_of).offset().top + jQuery("." + data_end_of).outerHeight();
	}
	TweenLite.to(window, 1.4, {scrollTo: {y:distance},ease: Power3.easeOut})
});
jQuery(document).on('click', '.tabs .titles li', function(event) {
	next = jQuery(this).data("content")
	jQuery(this).parent().find("li").removeClass("active");
	jQuery(this).parent().parent().find(".content li").removeClass("active")
	jQuery(this).parent().parent().find(".content li[data-title='"+next+"']").addClass("active")
	jQuery(this).addClass("active");
    event.preventDefault();
});
jQuery(document).on('click', '.team .members .row ul li .links a.more', function(event) {
//	return false;
		event.preventDefault();

    member_info = jQuery(this).parent().parent().parent().find(".info").html();
    info_box = jQuery(this).parent().parent().parent().parent().nextAll(".info-box").first();
		//info_box.html(member_info);

		//jQuery(this).css({'display':'none'}).parent().find('a.sluiten').css({'display':'inline-block'});

		if (jQuery(this).parent().parent().parent().hasClass("dropdown")) {
        jQuery(this).parent().parent().parent().removeClass("dropdown");
        jQuery(".team .members .row .info-box").stop().slideUp();
        return false;
    }

		jQuery(".team .members .row ul li .inner").removeClass("dropdown");
    jQuery(this).parent().parent().parent().addClass("dropdown");

		if (info_box.hasClass("opened")) {
        info_box.stop().slideUp(1000, function() {
						console.log('opened');
            info_box.html(member_info).stop().slideDown();
        });
    } else console.log('not opened'); jQuery(".team .members .row .info-box").stop().slideUp(); info_box.html(member_info).stop().slideDown().addClass("opened");

});



var filter_is = false;
var filters = jQuery(".actualiteiten .filters .dropdowns");
var filters_animation = new TimelineMax({paused:true});

var $_GET = {};

document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g, function () {
    function decode(s) {
        return decodeURIComponent(s.split("+").join(" "));
    }

    $_GET[decode(arguments[1])] = decode(arguments[2]);
});

jQuery(document).on('click', '.actualiteiten .filters .titles li', function(event) {

	var filter_this = jQuery(this);
	var filter_titles = jQuery(".actualiteiten .filters .titles li");
	var filter_to_go = jQuery(this).data("filter");
	var filter_opened = jQuery(".actualiteiten .filters .dropdowns div[data-filter='"+filter_to_go+"']");
	var filters_all = jQuery(".actualiteiten .filters .dropdowns div");
	var filters_height = filter_opened.outerHeight();



	filters_all.removeClass("opened");

	if ( !filter_is ){
		filters_animation.to(filters, 0.3, {height:filters_height,ease:Sine.easeOut})
		filters_animation.play();
		filter_is = true
		filter_this.addClass("opened");
		filter_opened.addClass("opened");
	}
	else{

		if ( filter_this.hasClass("opened") ) {
			filters_animation.to(filters, 0.3, {height:0,ease:Sine.easeOut})
			filters_animation.play();
			filter_is = false
			filter_titles.removeClass("opened");
		}
		else{
			filter_titles.removeClass("opened");
			filters_animation.to(filters, 0.3, {height:0,ease:Sine.easeOut, onComplete: function(){filter_this.addClass("opened");filter_opened.addClass("opened");filter_is = true}})
							.to(filters, 0.3, {height:filters_height,ease:Sine.easeOut})

		}

	}
});

if($_GET["c"]) setTimeout(function(){jQuery('.actualiteiten .filters .titles li.catfilter').trigger('click')},300);
if($_GET["a"]) setTimeout(function(){jQuery('.actualiteiten .filters .titles li.authorfilter').trigger('click')},300);
if($_GET["d"]) setTimeout(function(){jQuery('.actualiteiten .filters .titles li.datefilter').trigger('click')},300);


jQuery(window).scroll( function(){
	parallax();
});

/* -------------------------------------------------------------------
Hero image fade-in
---------------------------------------------------------------------- */
if (jQuery('.tilt').length === 0 && jQuery('#google-map').find('div').length === 0 && !jQuery('.header').hasClass('fixed-height-sm')) {
	var bgimage = new Image();
	bg = jQuery('.hero-img').css('background-image');
	bgurl = bg.replace('url(','').replace(')','').replace(/\"/gi, "");
	bgimage.src = bgurl;
	jQuery(bgimage).load(function(){
	    jQuery('.hero-img').css({'opacity':'1'});
	 });
}

 /* -------------------------------------------------------------------
 Hero image fade-in Home
 ---------------------------------------------------------------------- */
if (jQuery('.tilt').length > 0 ) {
	var bgimage = new Image();
	bg = jQuery('.tilt').css('background-image');
	bgurl = bg.replace('url(','').replace(')','').replace(/\"/gi, "");
	bgimage.src = bgurl;
	jQuery(bgimage).load(function(){
	   jQuery('.tilt').css({'opacity':'1'});
	});
}
/* -------------------------------------------------------------------
Load posts Actualiteiten
---------------------------------------------------------------------- */
var catval = '';
var authval = '';
var dateval = '';
var pageNumber = 1;

jQuery(".filter-div a").on("click", function (e) {
		e.preventDefault();
		pageNumber = 1;
		jQuery(".overlay").fadeIn(500);
		var thiselem = jQuery(this);
		catval = authval = dateval = '';
		if (thiselem.data('cat-val')) catval = thiselem.data('cat-val');
		if (thiselem.data('author-val')) authval = thiselem.data('author-val');
		if (thiselem.data('date-val')) dateval = thiselem.data('date-val');
    jQuery.post(ajax_url, {
        action: 'load_posts',
				category: catval,
				author: authval,
				date: dateval
    }, function (resp) {
        var articles = jQuery(resp);
        if(articles.length < 2){
            var new_div = jQuery(resp).hide();
						jQuery('.items').empty();
            jQuery('.items').append(new_div);
            new_div.fadeIn(500);
						new_div.addClass('active')
						thiselem.parent().find('a').removeClass('active');
						thiselem.addClass('active');
		        jQuery(".load-more").slideUp(500);
						jQuery(".load-more a.postmsg").remove();
						jQuery(".load-more a.meerladen").hide();
            jQuery(".load-more").append("<a class='postmsg'></a>");
						jQuery(".load-more .postmsg").html(postmsg);
						jQuery('.load-more').slideDown(500);
            //jQuery(".load-more a").unbind("click");
            //jQuery(".load-more a.meerladen").css({"cursor": "default", "pointer-event": "none"});
        } else {
          var new_div = jQuery(resp).hide();
					jQuery('.items').empty();
          jQuery('.items').append(new_div);
					thiselem.parent().find('a').removeClass('active');
					thiselem.addClass('active');
          new_div.fadeIn(500);
					new_div.addClass('active')
					jQuery(".load-more a.postmsg").remove();
					jQuery(".load-more a.meerladen").show();
					jQuery(".load-more a.meerladen").css({"cursor": "pointer", "pointer-event": "auto"});
	        jQuery(".load-more").slideDown(500);
        }
        jQuery(".overlay").fadeOut(500);
    })
		.done(function(msg){ })
    .fail(function(xhr, status, error) {
        // error handling
				console.log(xhr);
				console.log(status);
				console.log(error);
    });;
});

jQuery(".load-more a").on("click", function (e) {
		e.preventDefault();
		jQuery(this).parent().slideUp(500);
		pageNumber++;
		jQuery(".overlay").fadeIn(500);
		var thiselem = jQuery(this);
    jQuery.post(ajax_url, {
        action: 'load_posts',
        pagenum: pageNumber,
				category: catval,
				author: authval,
				date: dateval
    }, function (resp) {
        var articles = jQuery(resp);
        if(articles.length < 2){
            var new_div = jQuery(resp).hide();
            jQuery('.items').append(new_div);
            new_div.fadeIn(500);
						new_div.addClass('active')
						thiselem.parent().find('a').removeClass('active');
						thiselem.addClass('active');
						jQuery(".load-more a.postmsg").remove();
						jQuery(".load-more a.meerladen").hide();
						jQuery(".load-more").append("<a class='postmsg'></a>");
						jQuery(".load-more .postmsg").html(postmsg);
						jQuery('.load-more').slideDown(500);
            //jQuery(".load-more a").unbind("click");
            //jQuery(".load-more a.meerladen").css({"cursor": "default", "pointer-event": "none"});
        } else {
          var new_div = jQuery(resp).hide();
          jQuery('.items').append(new_div);
					thiselem.parent().find('a').removeClass('active');
					thiselem.addClass('active');
          new_div.fadeIn(500);
					new_div.addClass('active')
					jQuery(".load-more a.postmsg").remove();
					jQuery(".load-more a.meerladen").show();
					jQuery(".load-more a.meerladen").css({"cursor": "pointer", "pointer-event": "auto"});
	        jQuery('.load-more').slideDown(500);
        }
        jQuery(".overlay").fadeOut(500);
    })
    .fail(function(xhr, status, error) {
        // error handling
				console.log(xhr);
				console.log(status);
				console.log(error);
    });;
});

/* -------------------------------------------------------------------
Search AJAX call
---------------------------------------------------------------------- */

jQuery(".search-overlay form button").on("click", function (e) {
		e.preventDefault();
		jQuery(".search-overlay form button").fadeOut(100, function(){
			jQuery(".smallspinner").fadeIn(100);
		});
		jQuery('.searchresults').empty();
		var query = jQuery(this).prev().val();
		var thiselem = jQuery(this);
    jQuery.post(ajax_url, {
        action: 'load_search_results',
        query: query
    },
		function (resp) {
	    var articles = jQuery(resp);
      jQuery('.searchresults').append(articles);
			searchresults_opened = 1;
			search_anim_results_function(true);
			//var urlPath = "?q="+query;
			//window.history.pushState({"html":resp,"pageTitle":document.title},"", urlPath);
			jQuery(".smallspinner").fadeOut(100, function(){
				jQuery(".search-overlay form button").fadeIn(100);
			});
    })
    .fail(function(xhr, status, error) {
        // error handling
				console.log(xhr);
				console.log(status);
				console.log(error);
    });
	});

// Functions

function check_scroll_icon() {
	o = jQuery(".scroll-down")
	i = jQuery(".scroll-down .icon")
	o_position = o.offset().top + o.outerHeight(true);
	i_left = o.offset().left + o.outerWidth() - i.outerWidth();
	i_top = o.offset().top;
	if (o_position - jQuery(window).scrollTop() < o_position) o.addClass("fixed"), i.attr("style", "left:" + i_left + "px; top:" + i_top + "px"), i.addClass("up")
	else o.removeClass("fixed"), i.removeClass("up")
}



// Menu Animations


var menu = jQuery(".menu-overlay");
var menu_cats = menu.find(".inner .section.cats")
var menu_services = menu.find(".inner .section.services")
var menu_animation = new TimelineMax({paused:true});
menu_animation.set(menu, {height:"100%"})
			  .to(menu, 0.3, {opacity: 1})
			  .to(menu_cats, 0.3, {opacity: 1,paddingTop: 0})
			  .to(menu_services, 0.3, {delay:.05,opacity: 1,paddingTop: 0})

function menu_anim_func(e) {
	if (e == true) {
		menu.addClass("opened")
		jQuery(".header .btn.menu").addClass("opened")
		menu_opened = 1
		menu_animation.play();
		setTimeout(function(){jQuery(".menu-overlay").css("overflow","auto"); jQuery("body").addClass("fixed")}, 200);
	}
	else{
		menu.removeClass("opened")
		jQuery(".header .btn.menu").removeClass("opened")
		menu_opened = 0;
		menu_animation.reverse();
		setTimeout(function(){ jQuery("body").removeClass("fixed") }, 200);

	}
};


// Search Overlay Animation

var search_container = jQuery(".search-overlay");
var search_form = search_container.find("form");
var search_results = search_container.find(".searchresults");
var search_animation = new TimelineMax({paused:true});
var search_results_animation = new TimelineMax({paused:true});
search_animation.set(search_container, {height:"100%"})
						.to(search_container, .3, {opacity:1,ease:Sine.easeOut})
					 	.to(search_form, 0.3, {delay:0,opacity: 1,marginTop: 0});


//var search_results_header = search_container.find(".searchresult-header");
//var search_results_item = search_container.find(".searchitem");
search_results_animation.to(search_form, 0.3, {marginTop: -100})
						.to(search_results, 0.3, {opacity: 1,marginTop: 0});

function search_anim_function(e) {
	if (e == true){
		if ( jQuery(window).width() > 640 ) lang_width = jQuery(".header .top .right .lang").outerWidth() + 20;
		else lang_width = 0;
		setTimeout(function() {jQuery("body").addClass("fixed")}, 200);
		if (menu_opened == 1) {
			menu_anim_func(false)
			setTimeout(function() { search_animation.play() }, 800);
		}
		else search_animation.play()
	}
	else {
		setTimeout(function() {jQuery("body").removeClass("fixed")}, 200);
		search_animation.reverse();
	}
}

function search_anim_results_function(e) {
	if (e == true){
		jQuery(".searchitems").addClass("scroll");
		search_results_animation.play();
	}
	else {
		search_results_animation.reverse()
		setTimeout(function() {search_anim_function(false)}, 600);
	}
}


function parallax(){
       jQuery('.parallax .block .image').each( function(i){

			var elementTop = jQuery(this).offset().top
			var elementHeight = jQuery(this).height();
			var elementBottom = elementTop + jQuery(this).outerHeight();
			var viewportTop = jQuery(window).scrollTop();
			var viewportBottom = viewportTop + jQuery(window).height();


			if (elementBottom > viewportTop && (elementTop + (jQuery(this).outerHeight()/1.5)) < viewportBottom) jQuery(this).addClass("visible")
			else jQuery(this).removeClass("visible")
        });

}

function check_team_grid(){
	var ww = jQuery(window).width()
	var ul = jQuery(".team .members .row ul");
	var ib = '<li class="info-box"> </div>';
	var total_li = ul.find("li.person").length
	ul.find("li.person").removeClass("dropdown")



	ul.attr("class","")
	jQuery(".team .members .row ul .info-box").remove();

	if (ww > 1020){
		ul.attr("class",""), ul.find("li:nth-child(4n)").after(ib)
		x = total_li / 4
		if (Math.floor(x) !== x) ul.append(ib)
	}
	else if (ww > 760){
		ul.addClass("column-3"), ul.find("li:nth-child(3n)").after(ib)
		x = total_li / 3
		if (Math.floor(x) !== x) ul.append(ib)
	}
	else if (ww > 500){
		ul.addClass("column-2")
		ul.find("li:nth-child(2n)").after(ib)
		x = total_li / 2
		if (Math.floor(x) !== x) ul.append(ib)
	}
	else if (ww > 0) {
		ul.addClass("single"), ul.find("li").after(ib)
	};

}

/*!
Name: Reading Time
Dependencies: jQuery
Author: Michael Lynch
Author URL: http://michaelynch.com
Date Created: August 14, 2013
Date Updated: July 11, 2016
Licensed under the MIT license
*/

;(function($) {

	var totalReadingTimeSeconds;

    $.fn.readingTime = function(options) {

		//define default parameters
        var defaults = {
	        readingTimeTarget: '.eta',
	        wordCountTarget: null,
	        wordsPerMinute: 270,
	        round: true,
	        lang: 'en',
			lessThanAMinuteString: '',
			prependTimeString: '',
			prependWordString: '',
	        remotePath: null,
	        remoteTarget: null,
	        success: function() {},
	        error: function() {}
        },
        plugin = this,
        el = $(this);

        //merge defaults and options
        plugin.settings = $.extend({}, defaults, options);

        //define vars
        var s = plugin.settings;

        //if no element was bound
		if(!this.length) {

			//run error callback
			s.error.call(this);

			//return so chained events can continue
			return this;
		}



        //if s.lang is set to dutch
        if(s.lang == 'nl') {

	        var lessThanAMinute = s.lessThanAMinuteString || "Minder dan een minuut";

	        var minShortForm = 'min';

	    //default s.lang is english
        } else {

	        var lessThanAMinute = s.lessThanAMinuteString || 'Less than a minute';

	        var minShortForm = 'min';

        }

        var setTime = function(text) {

        	if(text !== '') {

		        //split text by spaces to define total words
				var totalWords = text.trim().split(/\s+/g).length;

				//define words per second based on words per minute (s.wordsPerMinute)
				var wordsPerSecond = s.wordsPerMinute / 60;

				//define total reading time in seconds
				totalReadingTimeSeconds = totalWords / wordsPerSecond;

				//define reading time in minutes
				//if s.round is set to true
				if(s.round === true) {

					var readingTimeMinutes = Math.round(totalReadingTimeSeconds / 60);

				//if s.round is set to false
				} else {

					var readingTimeMinutes = Math.floor(totalReadingTimeSeconds / 60);

				}

				//define remaining reading time seconds
				var readingTimeSeconds = Math.round(totalReadingTimeSeconds - readingTimeMinutes * 60);

				//if s.round is set to true
				if(s.round === true) {

					//if minutes are greater than 0
					if(readingTimeMinutes > 0) {

						//set reading time by the minute
						$(s.readingTimeTarget).text(s.prependTimeString + readingTimeMinutes + ' ' + minShortForm);

					} else {

						//set reading time as less than a minute
						$(s.readingTimeTarget).text(s.prependTimeString + lessThanAMinute);

					}

				//if s.round is set to false
				} else {

					//format reading time
					var readingTime = readingTimeMinutes + ':' + readingTimeSeconds;

					//set reading time in minutes and seconds
					$(s.readingTimeTarget).text(s.prependTimeString + readingTime);

				}

				//if word count container isn't blank or undefined
				if(s.wordCountTarget !== '' && s.wordCountTarget !== undefined) {

					//set word count
					$(s.wordCountTarget).text(s.prependWordString + totalWords);

				}

				//run success callback
				s.success.call(this);

			} else {

				//run error callback
				s.error.call(this, 'The element is empty.');
			}

		};

		//for each element
		el.each(function() {

	        //if s.remotePath and s.remoteTarget aren't null
	        if(s.remotePath != null && s.remoteTarget != null) {

	        	//get contents of remote file
	    		$.get(s.remotePath, function(data) {

					//set time using the remote target found in the remote file
					setTime($('<div>').html(data).find(s.remoteTarget).text());

				});

	        } else {

		        //set time using the targeted element
		        setTime(el.text());
	        }
        });

        return totalReadingTimeSeconds;
    }


})(jQuery);

<?php

define('SITEURL', site_url());
define('THEMEURL', get_template_directory_uri());
register_nav_menus(
        array(
            'main_menu' => __('Main menu', 'lemonscentedtea'),
            'footer_menu' => __('Footer menu', 'lemonscentedtea')
        )
);

/*
 *  @description: remove WPML styling
 */
define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
define('ICL_DONT_LOAD_NAVIGATION_CSS', true);
define('ICL_DONT_LOAD_LANGUAGES_JS', true);

/*
 *  @description: remove wp_head and footer clutter
 */
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('template_redirect', 'rest_output_link_header', 11, 0);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');

function my_deregister_scripts() {
    wp_deregister_script('wp-embed');
}

add_action('wp_footer', 'my_deregister_scripts');
global $sitepress;
remove_action('wp_head', array($sitepress, 'meta_generator_tag'));

/*
 *  @description: Add defer/async attrib to enqueued scripts
 */

add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);

function add_defer_attribute($tag, $handle) {
    $handlersuffix = substr($handle, -5);
    if ('Async' === $handlersuffix) {
        return str_replace(' src', ' async="async" src', $tag);
    } elseif ('Defer' === $handlersuffix) {
        return str_replace(' src', ' defer="defer" src', $tag);
    } else {
        return $tag;
    }
}

/*
 *  @description: Enqueue scripts. Put "Async" at the end of name for Async loading and "Defer" for deferred loading
 */

add_action('wp_enqueue_scripts', 'enqueue_scripts');

function enqueue_scripts() {

    wp_dequeue_script('jquery');
    wp_dequeue_script('jquery-core');
    wp_dequeue_script('jquery-migrate');
    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-3.2.1.min.js', array(), false, true);
    wp_enqueue_script('jquery-core', false, array(), false, true);
    wp_enqueue_script('jquery-migrate', false, array(), false, true);

    if (is_page_template('templates/template-home.php')) {
    }

    if (is_page_template('templates/template-over-ons.php')) {
    }


    if (is_page_template('template-contact.php')) {
        wp_enqueue_script('GoogleMaps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCGiM9Lk7ypP5rTKIP-1Dhp78Bd1CEpMgo&v=3', array(), '3.0.0', true);
        wp_enqueue_script('GoogleMapsCustom', get_template_directory_uri() . '/js/map.js', array('GoogleMaps'), '1.0.0', true);
    }

    /* General styles */
    //wp_enqueue_style('OwlThemeStyle', get_template_directory_uri() . '/css/owl.theme.default.css');
    //wp_enqueue_style('OwlSliderStyle', get_template_directory_uri() . '/css/owl.carousel.min.css');
    //wp_enqueue_style('BootstrapStyle', get_template_directory_uri().'/assets/bootstrap/css/bootstrap.min.css');
    //wp_enqueue_style('HamburgersStyle', get_template_directory_uri().'/assets/hamburger/hamburgers.css');
    wp_enqueue_style('ThemeStyle', get_template_directory_uri().'/css/main.css');
    //wp_enqueue_style('MainStyle', get_template_directory_uri() . '/style.css');

    /* General scripts */
    //wp_enqueue_script('OwlSliderDefer', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('TweenMaxDefer', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('EasePackDefer', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/easing/EasePack.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('ScrollToPluginDefer', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/plugins/ScrollToPlugin.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('BootstrapJs', get_template_directory_uri().'/assets/bootstrap/js/bootstrap.min.js', array(), false, true);
    wp_enqueue_script('JqueryTouchSwipe', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js', array(), false, true);

    /* Custom scripts */
    wp_enqueue_script('plugins-js', get_template_directory_uri() . '/js/plugins.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('CustomJSDefer', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);
}

/* ------------------------------------ */
/* Custom date format in filter list
/* ------------------------------------ */
add_filter ('get_archives_link',
function ($link_html, $url, $text, $format, $before, $after) {
    $expl = explode('/',$url);
    $dy = array_slice($expl, -3, 3, false);
    if ('with_plus' == $format) {
        $link_html = "<a href='#' data-date-val='".$dy[0]." ".$dy[1]."' class='datelink'>".$text."</a>";
    }
    return $link_html;
}, 10, 6);

/* ------------------------------------ */
/* AJAX Search Results
/* ------------------------------------ */

add_action( 'pre_get_posts', function( $q )
{
    if( $title = $q->get( '_meta_or_title' ) )
    {
        add_filter( 'get_meta_sql', function( $sql ) use ( $title )
        {
            global $wpdb;

            // Only run once:
            static $nr = 0;
            if( 0 != $nr++ ) return $sql;

            // Modified WHERE
            $sql['where'] = sprintf(
                " AND ( %s OR %s ) ",
                $wpdb->prepare( "{$wpdb->posts}.post_title like '%%%s%%'", $title),
                mb_substr( $sql['where'], 5, mb_strlen( $sql['where'] ) )
            );

            return $sql;
        });
    }
});

add_action("wp_ajax_load_search_results", "load_search_results");
add_action("wp_ajax_nopriv_load_search_results", "load_search_results");

function load_search_results() {

  $query = sanitize_text_field($_POST['query']);

  $meta_query = array();
  $args = array();

  $meta_query[] = array(
      'key' => 'smitwolf_home_cphoto_headline',
      'value' => $query,
      'compare' => 'LIKE'
  );
  $meta_query[] = array(
      'key' => 'smitwolf_home_cphoto_subheadline',
      'value' => $query,
      'compare' => 'LIKE'
  );
  $meta_query[] = array(
      'key' => 'smitwolf_home_intro_title',
      'value' => $query,
      'compare' => 'LIKE'
  );
  $meta_query[] = array(
      'key' => 'smitwolf_home_intro_text',
      'value' => $query,
      'compare' => 'LIKE'
  );
  $meta_query[] = array(
      'key' => 'smitwolf_over_ons_cphoto_headline',
      'value' => $query,
      'compare' => 'LIKE'
  );
  $meta_query[] = array(
      'key' => 'smitwolf_over_ons_cphoto_subheadline',
      'value' => $query,
      'compare' => 'LIKE'
  );
  $meta_query[] = array(
      'key' => 'timeline_group',
      'value' => $query,
      'compare' => 'LIKE'
  );
  $meta_query[] = array(
      'key' => 'werkwijze_group',
      'value' => $query,
      'compare' => 'LIKE'
  );
  $meta_query[] = array(
      'key' => 'smitwolf_over_ons_team_intro',
      'value' => $query,
      'compare' => 'LIKE'
  );
  $meta_query[] = array(
      'key' => 'smitwolf_actualiteiten_cphoto_headline',
      'value' => $query,
      'compare' => 'LIKE'
  );
  $meta_query[] = array(
      'key' => 'smitwolf_actualiteiten_cphoto_subheadline',
      'value' => $query,
      'compare' => 'LIKE'
  );
  $meta_query[] = array(
      'key' => 'smitwolf_contact_address_left',
      'value' => $query,
      'compare' => 'LIKE'
  );
  $meta_query[] = array(
      'key' => 'smitwolf_contact_address_right',
      'value' => $query,
      'compare' => 'LIKE'
  );
  $meta_query[] = array(
      'key' => 'smitwolf_services_cphoto_headline',
      'value' => $query,
      'compare' => 'LIKE'
  );
  $meta_query[] = array(
      'key' => 'smitwolf_services_intro_headline',
      'value' => $query,
      'compare' => 'LIKE'
  );
  $meta_query[] = array(
      'key' => 'smitwolf_services_intro_text',
      'value' => $query,
      'compare' => 'LIKE'
  );
  $meta_query[] = array(
      'key' => 'werkzaamheden_group',
      'value' => $query,
      'compare' => 'LIKE'
  );
  $meta_query[] = array(
      'key' => 'producten_group',
      'value' => $query,
      'compare' => 'LIKE'
  );

  //if there is more than one meta query 'or' them
  if(count($meta_query) > 1) {
      $meta_query['relation'] = 'OR';
  }

  // The Query
  $args['post_type'] = array('post','page');
  $args['post_status'] = "publish";
  $args['_meta_or_title'] = $search_string; //not using 's' anymore
  $args['meta_query'] = $meta_query;

  $search = new WP_Query( $args );
  $out = '';

  if ( $search->have_posts() ) {
      $out .= '<h2 class="searchresult-header">'.$search->found_posts.' Zoekresultaten gevonden voor \''.$query.'\'</h2>';
      $out .= '<div class="searchitems">';
      while ( $search->have_posts() ) {
        $search->the_post();
        $metas = get_post_meta(get_the_ID());
        $introtext = get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true);
        $permalink = get_the_permalink();
        $title = get_the_title();
        $trimmed = wp_trim_words($introtext, $num_words = 50, $more = '...');
        $author = get_the_author_meta('display_name');
        $authorurl = get_author_posts_url(get_the_author_meta('ID'));
        $postdate = get_the_date('d.m.Y',get_the_ID());
          $out .= '<div class="searchitem">
          <div class="inner">
            <div class="text-block">
                <h3 class="title">'.$title.'</h3>
                <div class="text">'.$trimmed.'</div>
                <a href="'.$permalink.'" class="more">Lees verder</a>
            </div>
          </div>
        </div>';
      }
      $out .= '</div>';
      die($out);
  } else {
    $out .= '<h2 class="searchresult-header">Geen zoekresultaten gevonden voor \''.$query.'\'</h2>';
    die($out);
  }
  wp_reset_postdata();
}

/* ------------------------------------ */
/* AJAX Calls Actualiteiten
/* ------------------------------------ */

add_action("wp_ajax_load_posts", "load_posts");
add_action("wp_ajax_nopriv_load_posts", "load_posts");

function load_posts() {

  $pagenum = $_POST['pagenum'];
  $category = $_POST['category'];
  $author = $_POST['author'];
  $date = $_POST['date'];
  $expl = explode(' ',$date);

  $args = array(
      'suppress_filters' => false,
      'posts_per_page' => 6,
      'orderby' => 'date',
      'order' => 'DESC',
      'paged' => $pagenum,
      'category_name' => $category,
      'author' => $author,
      'date_query' => array(array(
          'year'  => $expl[0],
          'month' => $expl[1]
        ))
    );

  $posts = get_posts($args);

  $out = '';
  $counter = 0;
  foreach ($posts as $rec_post) {
      $counter++;
      $rec_img_url = get_the_post_thumbnail_url($rec_post->ID, 'actualiteiten');
      $permalink = get_permalink($rec_post->ID);
      $title = $rec_post->post_title;
      $trimmed = wp_trim_words($rec_post->post_content, $num_words = 20, $more = '...');
      $author = get_the_author_meta('display_name', $rec_post->post_author);
      $authorurl = get_author_posts_url(get_the_author_meta('ID', $rec_post->post_author));
      $postdate = get_the_date('d.m.Y',$rec_post->ID);
      if ($counter % 2 == 1) {
        $out .= '<div class="item blocklink">
        <div class="inner">
        <a href="'.$permalink.'" class="link">
          <div class="image top">
            <div class="src" style="background:url('.$rec_img_url.'); background-size:cover"></div>
            <div class="frame"></div>
          </div>
        </a>
          <div class="text-block">
              <div class="text">'.$trimmed.'</div>
              <div class="author">'. $author . ' / <span class="date">'. $postdate .'</span></div>
          </div>
        </div>
      </div>';
        } else {
          $out .= '<div class="item blocklink">
            <div class="inner">
              <div class="text-block">
                  <div class="text">'.$trimmed.'</div>
                  <div class="author">'. $author . ' / <span class="date">'. $postdate .'</span></div>
              </div>
            <a href="'.$permalink.'" class="link">
              <div class="image bottom">
                  <div class="src" style="background:url('.$rec_img_url.'); background-size:cover"></div>
                  <div class="frame"></div>
              </div>
            </a>
          </div>
        </div>';
      }
  }
  die($out);
}

// Post types function
function create_posttypes() {
    register_post_type('team',
            // CPT Options
            array(
        'labels' => array(
            'name' => __('Team'),
            'singular_name' => __('Team'),
            'add_new' => __('Nieuw teamlid')
        ),
        'public' => true,
        'has_archive' => true,
        'exclude_from_search' => true,
        'supports' => array('title'),
        'menu_icon' => 'dashicons-admin-users',
        'rewrite' => array('slug' => 'team'),
            )
    );
    register_post_type('vacatures',
            // CPT Options
            array(
        'labels' => array(
            'name' => __('Vacatures'),
            'singular_name' => __('Vacature'),
            'add_new' => __('Nieuwe vacature')
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title','editor'),
        'menu_icon' => 'dashicons-format-aside',
        'rewrite' => array('slug' => 'vacatures'),
            )
    );
    register_post_type('cases',
            // CPT Options
            array(
        'labels' => array(
            'name' => __('Cases'),
            'singular_name' => __('Case'),
            'add_new' => __('Nieuwe case')
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title'),
        'menu_icon' => 'dashicons-portfolio',
        'rewrite' => array('slug' => 'cases'),
            )
    );
    register_post_type('slider',
            // CPT Options
            array(
        'labels' => array(
            'name' => __('Cases slider'),
            'singular_name' => __('Cases slider'),
            'add_new' => __('Nieuwe slide')
        ),
        'public' => true,
        'has_archive' => true,
        'exclude_from_search' => true,
        'supports' => array('title'),
        'menu_icon' => 'dashicons-slides',
        'rewrite' => array('slug' => 'slider'),
            )
    );
}

add_action('init', 'create_posttypes');


// Move Yoast Meta Box to bottom
function yoasttobottom() {
	return 'low';
}

add_filter( 'wpseo_metabox_prio', 'yoasttobottom');

function footersidebars() {
  register_sidebar( array(
  'name' => 'Footer contact details',
  'id' => 'footer-sidebar-1',
  'description' => '',
  'before_widget' => '',
  'after_widget' => '',
  'before_title' => '',
  'after_title' => '',
  ) );
  register_sidebar( array(
      'name' => 'Header Text',
      'id' => 'header-text',
      'description' => '',
      'before_widget' => '',
      'after_widget' => '',
      'before_title' => '',
      'after_title' => '',
  ) );
}

add_action('widgets_init', 'footersidebars');


add_theme_support('post-thumbnails', array('post', 'page'));

add_theme_support('custom-logo', array(
    'height' => 240,
    'width' => 240,
    'flex-height' => true,
    'flex-width' => true
));

function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');

/*
 * @description:  Remove default editor for testimonials and team post types
 */


add_action('init', function() {
    remove_post_type_support('team', 'editor');
    remove_post_type_support('team', 'thumbnail');
    //remove_post_type_support('page', 'editor');
    //remove_post_type_support('page', 'thumbnail');
    remove_post_type_support('vacatures', 'editor');
    remove_post_type_support('vacatures', 'thumbnail');
}, 99);

/*
 * @description: Metaboxes initialization
 */
//require_once 'metaboxes.php';


/* Custom image sizes */

add_image_size('hero-imageL', 1600, 9999);
add_image_size('hero-imageM', 1024, 9999);
add_image_size('hero-imageS', 768, 9999);

add_image_size('tilt-imageL', 1920, 9999);
add_image_size('tilt-imageM', 1229, 9999);
add_image_size('tilt-imageS', 922, 9999);

add_image_size('thumb', 240, 240, array('center', 'center'));
add_image_size('biggerthumb', 390, 390, array('center', 'center'));

add_image_size('home-intro', 1200, 1010, array('center', 'center'));
add_image_size('actualiteiten', 704, 550, array('center', 'center'));
add_image_size('testimonialsimage', 990, 840, array('center', 'center'));
add_image_size('productimage', 640, 300, array('center', 'center'));

/*
 * @description: Remove Links and Comments from Admin menu
 */

//add_action('admin_menu', 'my_remove_menu_pages');

function my_remove_menu_pages() {
    remove_menu_page('link-manager.php');
    remove_menu_page('edit-comments.php');
}

/*  Custom thumbnail quality
  /* ------------------------------------ */

function alx_thumbnail_quality($quality) {
    return 100;
}

add_filter('jpeg_quality', 'alx_thumbnail_quality');
add_filter('wp_editor_set_quality', 'alx_thumbnail_quality');

/* Disable stupid emojis
  /* ------------------------------------ */

function disable_wp_emojicons() {

    // all actions related to emojis
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');

    // filter to remove TinyMCE emojis
    add_filter('tiny_mce_plugins', 'disable_emojicons_tinymce');
}

add_action('init', 'disable_wp_emojicons');

function disable_emojicons_tinymce($plugins) {
    if (is_array($plugins)) {
        return array_diff($plugins, array('wpemoji'));
    } else {
        return array();
    }
}

function language_selector_flags(){
    if (function_exists('icl_get_languages')) {
        $languages = icl_get_languages('skip_missing=0&orderby=code&order=desc');           
        echo '<div class="lang_selector">';
            if(!empty($languages)){
                foreach($languages as $l){
                    $class = $l['active'] ? ' class="active"' : NULL;
                    $langs .=  '<a ' . $class . ' href="'.$l['url'].'">' . strtoupper ($l['language_code']). '</a> | ';
                }
                $langs = substr($langs,0,-3);
                echo $langs;
            }
        echo '</div>';
    }
}
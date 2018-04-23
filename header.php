<!doctype html>
<html class="no-skrollr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <title><?php echo wp_title(); ?></title>
        <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-MNTW5L7');</script>
        <!-- End Google Tag Manager -->
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MNTW5L7"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <script>
    var ajax_url = "<?php echo admin_url('admin-ajax.php'); ?>";
    var templateurl = "<?php echo get_template_directory_uri(); ?>";
    </script>
    <header>
        <div class="mainheader">
            <div class="container">
                <div class="row">
                    <div class="col-xs-10">
                        <div class="logo pull-left" id="header-image">
                            <div class="wrapp-logo">
                                <?php the_custom_logo(); ?>
                            </div>
                            <div class="wrapp-header-text">
                                <?php dynamic_sidebar( 'header-text' ); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-2">

                        <button class="hamburger hamburger--spin" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                        
                        <div class="background-block-menu">
                            <div class="header-menu pull-right">
                                
                                <div class="lang-block">
                                    <?php    
                                    if ( function_exists('icl_object_id') ) {
                                        
                                        language_selector_flags();
                                        
                                    }                               
                                    ?>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="list-menu-block">
                                <?php
                                if ( has_nav_menu( 'main_menu' ) ) {
                                    
                                    wp_nav_menu(array(
                                        'menu' => 'Main menu',
                                        'menu_class' => 'menu main_menu'
                                    ));
                                    
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </header>
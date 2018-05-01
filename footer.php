        <div id="footer">
            <div class="container-fluid">

                <div class="row">
                    
                    <div class="col-6">
                        <div class="row">
                            <div class="col-auto logo">
                                <?php the_custom_logo(); ?>
                            </div>
                            <div class="col-auto contact-info ">
                                <?php if(is_active_sidebar('footer-sidebar-1')){
                                        dynamic_sidebar('footer-sidebar-1');
                                    }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="row justify-content-end justify-content-start-sm">
                            <div class="col-auto footer-menu text-left">
                                <?php
                                    wp_nav_menu(array(
                                        'menu' => 'footer_menu',
                                        'menu_class' => 'menu footer-menu'
                                    ));
                                ?>
                            </div>
                            <div class="col-auto text-left form-col">
                                <form class="mailchimp-form js-mailchimp-form" novalidate>
                                    <p><?php _e('Subscribe to our newsletter', 'lemonscentedtea'); ?></p>
                                    <div class="form-group">
                                        <input id="email" placeholder="<?php _e('your e-mail', 'lemonscentedtea'); ?>" type="email" autocomplete="off">
                                        <div class="status-message">
                                            <p class="status-message__typing"><?php _e('Press enter to sent', 'lemonscentedtea'); ?></p>
                                            <p class="status-message__success"><?php _e('Thanks, we have sent you an e-mail', 'lemonscentedtea'); ?></p>
                                            <p class="status-message__error"><?php _e('Please check e-mail address', 'lemonscentedtea'); ?></p>
                                        </div>
                                    </div>

                                    <div>
                                        <?php $disclaimer_id = get_field('disclaimer_page', 'option'); ?>

                                        <?php if ( $disclaimer_id ) : ?>
                                            <a href="<?php echo get_permalink($disclaimer_id); ?>"><?php _e('Disclaimer'); ?></a>
                                        <?php else: ?>
                                            <div class="alert alert-danger">Please select Disclaimer page in Theme settings.</div>
                                        <?php endif; ?>
                                        
                                    </div>
                                    <div class="alerts"></div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div> <!-- end container -->
        </div> <!-- end #footer -->

        <?php wp_footer(); ?>

    </body>

</html>

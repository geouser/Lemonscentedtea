        <div id="footer">
            <div class="container-fluid">

                <div class="row align-items-center">
                    
                    <div class="col-lg-6 col-md-7">
                        <div class="row align-items-center">
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

                    <div class="col-lg-6 col-md-5">
                        <div class="row justify-content-end align-items-center">
                            <div class="col-md-auto footer-menu text-left">
                                <?php
                                    wp_nav_menu(array(
                                        'menu' => 'footer_menu',
                                        'menu_class' => 'menu footer-menu'
                                    ));
                                ?>
                            </div>
                            <div class="col-auto text-left">
                                <form class="subscribe-form" novalidate>
                                    <p>Subcribe to our newsletter</p>
                                    <div class="form-group">
                                        <input id="email" placeholder="your e-mail" type="email" autocomplete="off">
                                        <div class="status-message">
                                            <p class="status-message__success">Press enter to sent</p>
                                            <p class="status-message__error">Something is wrong</p>
                                        </div>
                                    </div>
                                    <div>
                                        <small>Disclaimer</small>
                                    </div>
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

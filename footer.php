        <div id="footer">
            <div class="container-fluid">

                <div class="row">
                    
                    <div class="col-12 col-md-6">
                        <div class="row">
                            <div class="col-auto logo">
                                <img src="<?php echo get_template_directory_uri();?>/assets/svg/logo-white.svg" alt="">
                                <?php the_custom_logo(); ?>
                            </div>
                            <div class="col-auto contact-info ">
                                <!-- <?php if(is_active_sidebar('footer-sidebar-1')){
                                        dynamic_sidebar('footer-sidebar-1');
                                    }
                                ?> -->
                                <p>Korte Prinsengracht 26</br>
                                1013 GS Amsterdam</br>
                                T: +31 (0) 20 606 3580</br>
                                E: info@lemonscentedtea.com</br></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="row justify-content-end-md">
                            <div class="col-auto footer-menu text-left">
                                <?php
                                    wp_nav_menu(array(
                                        'menu' => 'footer_menu',
                                        'menu_class' => 'menu footer-menu'
                                    ));
                                ?>
                            </div>
                            <div class="col-auto subscribe text-left">
                                <div class="title">Subcribe to our newsletter</div>
                                <form id="form_subcribe">
                                    <div><input id="email" placeholder="your e-mail"></div>
                                    <div class="subcribe-submit"><input type="submit" value="Submit"></div>
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

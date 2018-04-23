        <div id="footer">
            <div class="container">

                <div class="row">
                    
                    <div class="col-12 col-md-6">
                        <div class="row">
                            <div class="col-12 col-md-4 logo">
                                <?php the_custom_logo(); ?>
                            </div>
                            <div class="col-12 col-md-8 contact-info ">
                                <?php if(is_active_sidebar('footer-sidebar-1')){
                                        dynamic_sidebar('footer-sidebar-1');
                                    }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="row justify-content-end-md">
                            <div class="col-12 col-md-4 footer-menu text-left">
                                <?php
                                    wp_nav_menu(array(
                                        'menu' => 'footer_menu',
                                        'menu_class' => 'menu footer-menu'
                                    ));
                                ?>
                            </div>
                            <div class="col-12 col-md-4 subscribe text-left">
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

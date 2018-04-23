<div id="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-2 col-xs-4 logo">
                <?php the_custom_logo(); ?>
            </div>
            
            <div class="col-md-2 col-sm-4 col-xs-8 contact-info">
                <?php if(is_active_sidebar('footer-sidebar-1')){
                        dynamic_sidebar('footer-sidebar-1');
                    }
                ?>
            </div>
            <div class="col-md-2"></div>
            
            <div class="col-md-2 col-sm-2 col-xs-4 footer-menu">
                <?php
                    wp_nav_menu(array(
                        'menu' => 'footer_menu',
                        'menu_class' => 'menu footer-menu'
                    ));
                ?>
            </div>
            
            <div class="col-md-3 col-sm-4 col-xs-8 subscribe">
                <div class="title">Subcribe to our newsletter</div>
                <form id="form_subcribe">
                    <div><input id="email" placeholder="your e-mail"></div>
                    <div class="subcribe-submit"><input type="submit" value="Submit"></div>
                </form>
                <!--<div class="disclaimer">Disclaimer</div>-->
            </div>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>

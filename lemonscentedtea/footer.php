<div id="footer">

        <div class="top">
            <div class="inner fix-width">
              <a class="scroll-up"></a>
              <ul>
                <div class="title"><?php _e('Overige', 'smitwolf')?></div>
                <?php
                wp_nav_menu(array(
                    'menu' => 'footer_menu',
                    'menu_class' => 'menu footer-menu'
                ));
                ?>
                </ul>
                <ul>
                 <?php if(is_active_sidebar('footer-sidebar-1')){
                  dynamic_sidebar('footer-sidebar-1');
                  } ?>
                </ul>
            </div>
        </div>
        <div class="bottom">
            <div class="inner fix-width">
                <div class="social-media">
                    <a href="https://www.linkedin.com/company/smit-en-de-wolf-b.v." target="_blank" class="linkedin"></a>
                    <a href="https://api.whatsapp.com/send?phone=31654322917" target="_blank" class="whatsapp"></a>
                </div>
                <div class="copyright"><?php _e('©2017 ALL RIGHTS RESERVED', 'smitwolf')?></div>
            </div>
        </div>
</div>
<?php wp_footer(); ?>
</body>
</html>

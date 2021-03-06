<?php
/*
 * Template Name: Cases Archive
 *
 * @package WordPress
 * @subpackage Lemon_Scented_Tea
 * @since Lemon Scented Tea 1.0
 */

get_header();

?>

<div id="main">
	<section class="cases">
		<div class="cases-container">

        
        <?
		global $wp_query;
        if ( have_posts() ) : while ( have_posts() ) : the_post(); 
            get_template_part('parts/part', 'case');    
            endwhile; // end while
        endif; // end if
        ?>

        </div>
		<?php
			if (  $wp_query->max_num_pages > 1 && $wp_query->max_num_pages  ) { ?>
				<button class="large-button js-load-cases">
					<span class="large-button__default-text"><?php _e('More cases', 'lemonscentedtea'); ?></span>
					<span class="large-button__loading-text"><?php _e('Loading', 'lemonscentedtea'); ?>...</span>
					<span class="large-button__disabled-text"><?php _e('No more cases', 'lemonscentedtea'); ?>...</span>
				</button>
			<?php }
		?>

	</section>

</div>

<?php get_footer(); ?>

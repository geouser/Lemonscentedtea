<?php


/**
 * Template Name: Home Page Template
 *
 * @package WordPress
 * @subpackage Lemon_Scented_Tea
 * @since Lemon Scented Tea 1.0
 */
get_header();

?>



<div id="main">
<?php
	if( have_rows('slider') ): ?>
	<section>
		<div class="hero-slider"> <?
		while ( have_rows('slider') ) : the_row(); ?>
			<div class="slide item" style="background-image: url(<?php echo the_sub_field('image')?>); ">
    			<div class="container">
	    			<div class="slider-description">
	                    <div class="slider-title"><?php the_sub_field('title'); ?></div>
	                    <div class="slider-subtitle">
							<?php the_sub_field('subtitle'); ?>
	                    </div>
	                </div>	
    			</div>
            </div>
		<?
		endwhile; ?>
		</div> 
	</section><?

	endif;
?>

    <section class="section">
    	<div class="container">
	    	<div class="our-story">
	            <? the_post(); the_content();?>
	        </div>	
    	</div>
    </section> <!-- end section -->

</div> <!-- end #main -->



<?php get_footer(); ?>
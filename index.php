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
		while ( have_rows('slider') ) : the_row(); 
		
			$link = '';
			if (get_sub_field('custom_link')) {
				$link = get_sub_field('custom_url');
			} else {
				$link = get_sub_field('link');
			}

			$attachment_id = get_sub_field('image');
			$size = "2000";
			$image = wp_get_attachment_image_src( $attachment_id, $size );
			// url = $image[0];
			// width = $image[1];
			// height = $image[2];

			if (get_sub_field('slide_link')) {?>
				<a href="<?php echo $link; ?>" class="slide item" style="background-image: url(<?php echo $image[0]; ?>); ">
					<div class="container">
						<div class="slider-description">
							<div class="slider-title"><?php the_sub_field('title'); ?></div>
							<div class="slider-subtitle">
								<?php the_sub_field('subtitle'); ?>
							</div>
						</div>	
					</div>
				</a>
			<?php } else { ?>
				<div class="slide item" style="background-image: url(<?php echo $image[0]; ?>); ">
					<div class="container">
						<div class="slider-description">
							<div class="slider-title"><?php the_sub_field('title'); ?></div>
							<div class="slider-subtitle">
								<?php the_sub_field('subtitle'); ?>
							</div>
						</div>	
					</div>
				</div>
			<?php }
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
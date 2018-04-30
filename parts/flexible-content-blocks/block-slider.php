<?php
	if( have_rows('slides') ): ?>
	<div class="gallery-slider"> <?
		while ( have_rows('slides') ) : the_row(); 
			$imageID = get_sub_field('image');
			$image = wp_get_attachment_image_src( $imageID, 'figure' );
			$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
		?>
            <figure class="figure gallery-slider__slide">
				<img src="<?php echo $image[0]; ?>" alt="<?php echo $alt_text; ?>" />
                <figcaption class="gallery-slider__slide__text"><?php the_sub_field('placeholder'); ?></figcaption>
            </figure>
		<?
		endwhile; ?>
	</div><?

	endif;
?>
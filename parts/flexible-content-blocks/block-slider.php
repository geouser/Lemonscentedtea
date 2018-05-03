<?php $counter = 0; ?>

<?php if ( have_rows('slides') ) : ?>
	<div class="gallery-slider"> 
		<? while ( have_rows('slides') ) : the_row(); ?>
			<?php 
				$imageID = get_sub_field('image');

				$image_full = wp_get_attachment_image_src( $imageID, 'full' );
				$image_1600 = wp_get_attachment_image_src( $imageID, 'figure_1600' );
				$image_1100 = wp_get_attachment_image_src( $imageID, 'figure_1100' );
				$image_800 = wp_get_attachment_image_src( $imageID, 'figure_800' );
				$image_500 = wp_get_attachment_image_src( $imageID, 'figure_500' );

				$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
				$src = $image_500[0];

			?>
            <figure class="figure gallery-slider__slide" data-width="<?php echo $image_full[1]; ?>" data-height="<?php echo $image_full[2]; ?>">
				<img 
					data-full="<?php echo $image_full[0]; ?>"
					data-1600="<?php echo $image_1600[0]; ?>"
					data-1100="<?php echo $image_1100[0]; ?>"
					data-800="<?php echo $image_800[0]; ?>"
					data-500="<?php echo $image_500[0]; ?>"

					data-lazy="<?php echo $image_full[0]; ?>" alt="<?php echo $alt_text; ?>" />
                <figcaption class="gallery-slider__slide__text"><?php the_sub_field('placeholder'); ?></figcaption>
            </figure>
		<? endwhile; ?>
	</div>
<? endif; ?>
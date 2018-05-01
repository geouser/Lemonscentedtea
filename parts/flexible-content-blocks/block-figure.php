<?php
	$image_caption = get_sub_field('image_caption');

	$imageID = get_sub_field('image');
	$image_small = wp_get_attachment_image_src( $imageID, 'figure_preview' );

	$image_1100 = wp_get_attachment_image_src( $imageID, 'figure_1100' );
	$image_800 = wp_get_attachment_image_src( $imageID, 'figure_800' );
	$image_500 = wp_get_attachment_image_src( $imageID, 'figure_500' );
	$image_full = wp_get_attachment_image_src( $imageID, 'figure' );

	$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
?>


<?php if ( $imageID ) : ?>

	<figure class="figure placeholder" 
		data-full="<?php echo $image_full[0]; ?>"
		data-1100="<?php echo $image_1100[0]; ?>"
		data-800="<?php echo $image_800[0]; ?>"
		data-500="<?php echo $image_500[0]; ?>">
		
		<img src="<?php echo $image_small[0]; ?>" class="img-small" alt="<?php echo $alt_text; ?>">

		<?php if ( $image_caption ) : ?>
			<figcaption><?php echo $image_caption; ?></figcaption>
		<?php endif; ?>
		
	</figure>

<?php endif; ?>

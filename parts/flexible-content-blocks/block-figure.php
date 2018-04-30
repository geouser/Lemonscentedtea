<?php
	$image_caption = get_sub_field('image_caption');

	$imageID = get_sub_field('image');
	$image = wp_get_attachment_image_src( $imageID, 'figure_preview' );
	$image_full = wp_get_attachment_image_src( $imageID, 'figure' );
	$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
?>

<?php if ( $image ) : ?>

	<figure class="figure placeholder" data-large="<?php echo $image_full[0]; ?>">
		
		<img src="<?php echo $image[0]; ?>" class="img-small" alt="<?php echo $alt_text; ?>">

		<?php if ( $image_caption ) : ?>
			<figcaption><?php echo $image_caption; ?></figcaption>
		<?php endif; ?>
		
	</figure>

<?php endif; ?>

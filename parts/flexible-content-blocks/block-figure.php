<?php 
	$image_array = get_sub_field('image');

	$image_url = $image_array['sizes']['figure'];

	$image_caption = get_sub_field('image_caption');
?>

<?php if ( $image_url ) : ?>

	<figure class="figure">
		
		<img src="<?php echo $image_url; ?>" alt="">

		<?php if ( $image_caption ) : ?>
			<figcaption><?php echo $image_caption; ?></figcaption>
		<?php endif; ?>
		
	</figure>

<?php endif; ?>
<div class="container <?php if(get_sub_field('center_image')) { echo 'container--full'; } ?>">
	<div class="text-block <?php if(get_sub_field('center_image')) { echo 'centered-image'; } ?>">
		<?php 
			$title = get_sub_field('title');
			$title_tag = get_sub_field('title_tag');

			$imageID = get_sub_field('image');
			$image = wp_get_attachment_image_src( $imageID, 'full' );
			$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
		?>
		
		<div class="row align-items-center">
			<div class="col-12 col-lg-6">
				<?php if ( $title ) : ?>
					<<?php echo $title_tag; ?> class="text-block__title decorated-title"><?php echo $title; ?></<?php echo $title_tag; ?>>
				<?php endif; ?>

				<div class="text-block__content">
					<?php the_sub_field('content'); ?>
				</div>
			</div>

			<div class="col-12 col-lg-6">

				<?php if ( $image ) : ?>
					<div class="text-block__image">
						<img src="<?php echo $image[0]; ?>" alt="<?php echo $alt_text; ?>" style="max-width: <?php the_sub_field('image_width'); ?>px;"/>
					</div>
				<?php endif; ?>
			</div>
		</div>
		
	</div>	
</div>

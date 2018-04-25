<div class="container">
	<div class="text-block">
		<?php 
			$title = get_sub_field('title');
			$title_tag = get_sub_field('title_tag');
		?>
		<?php if ( $title ) : ?>
			<<?php echo $title_tag; ?> class="text-block__title decorated-title"><?php echo $title; ?></<?php echo $title_tag; ?>>
		<?php endif; ?>
		
		<div class="text-block__content">
			<div class="text-block__columns">
				<?php the_sub_field('content'); ?>
			</div>	
		</div>
		
	</div>	
</div>

<?php
	if( have_rows('slides') ): ?>
	<div class="gallery-slider"> <?
		while ( have_rows('slides') ) : the_row(); ?>
            <figure class="figure gallery-slider__slide" style="background-image: url('<?php echo the_sub_field('image')?>')">
                <figcaption class="gallery-slider__slide__text"><?php the_sub_field('placeholder'); ?></figcaption>
            </figure>
		<?
		endwhile; ?>
	</div><?

	endif;
?>
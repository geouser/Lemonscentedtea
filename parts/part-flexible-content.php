<article>

	<?php
		if ( get_field('content') ):

			while( have_rows('content') ):

				the_row();

				$layout = get_row_layout();
				
				get_template_part('parts/flexible-content-blocks/block', $layout );

			endwhile;

		endif; 
	?>

</article>
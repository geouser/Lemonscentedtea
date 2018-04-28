<?php
/*
 * General page template
 *
 * @package WordPress
 * @subpackage Lemon_Scented_Tea
 * @since Lemon Scented Tea 1.0
 */

get_header();

?>

<div id="main">
	
	<section class="general-page">
		
			
			<?php get_template_part('parts/part', 'flexible-content'); ?>

		
	</section>

</div> <!-- end main -->

<?php get_footer(); ?>

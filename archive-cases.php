<?php
/*
 * Template Name: Cases Archive
 *
 * @package WordPress
 * @subpackage Lemon_Scented_Tea
 * @since Lemon Scented Tea 1.0
 */

get_header();

?>

<div id="main">
	<section class="cases">
		<div class="cases-container">

        
        <?
        if ( have_posts() ) : while ( have_posts() ) : the_post(); 
            get_template_part('parts/part', 'case');    
            endwhile; // end while
        endif; // end if
        ?>

        </div>

		<button class="large-button js-load-cases">
			<span class="large-button__default-text">More cases</span>
			<span class="large-button__loading-text">Loading...</span>
			<span class="large-button__disabled-text">No more cases...</span>
		</button>

	</section>

</div>

<?php get_footer(); ?>

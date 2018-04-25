<?php
/*
 * Template Name: Cases Template
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
            $args = array(
				'post_type' => 'cases',
				'paged' => 1
            );

			$query = new WP_Query($args);
			?>
			<script>
				// {ID} is any unique name, example: b1, q9, qq, misha etc, it should be unique
				var posts_cases = '<?php echo serialize( $query->query_vars ) ?>',
					current_page_cases = <?php echo $query->query_vars['paged'] ?>,
					max_page_cases = <?php echo $query->max_num_pages ?>

			</script><?php 

            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {  $query->the_post();
                    get_template_part('parts/part', 'case');
                }
                wp_reset_postdata(); 
            } // end if query
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

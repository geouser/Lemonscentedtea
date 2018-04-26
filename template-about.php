<?php
/*
 * Template Name: About Us Template
 *
 * @package WordPress
 * @subpackage Lemon_Scented_Tea
 * @since Lemon Scented Tea 1.0
 */

get_header();

?>

<div id="main">
	
	<section class="about-us">
			
		<?php get_template_part('parts/part', 'flexible-content'); ?>
		
	</section>


	<section class="team">
		
		<div class="team-container">

			<?php 

				$args = array(
					'post_type' 		=> 'team',
					'posts_per_page' 	=> 2,
					'paged' 			=> 1,
					'post_status' 		=> 'publish'
				);

				$query = new WP_Query( $args );

				if ( $query -> have_posts() ) :

					while ( $query -> have_posts() ) :

						$query -> the_post();

						get_template_part( 'parts/part', 'team');

					endwhile;

				endif;

			?>

		</div>
		
		<?php if ( $query -> have_posts() ) : ?>
			<script>
				var team = {
					post_type: 'team',
					posts_per_page: 2,
					paged: 2,
					post_status: 'publish',
					max_pages: <?php echo $query->max_num_pages; ?>
				}
			</script>
			
			<button class="large-button js-load-team">
				<span class="large-button__default-text">More lemons</span>
				<span class="large-button__loading-text">Loading...</span>
				<span class="large-button__disabled-text">No more lemons...</span>
			</button>
		<?php endif; ?>
	</section> <!-- end team -->
		

	
	<section class="clients">
		<div class="container">
			
			<div class="row justify-content-center align-items-center">
				<div class="col-6 col-sm-4 col-md-3"><a href="#" target="_blank"><img src="https://placeholdit.co//i/160x60?"></a></div>
				<div class="col-6 col-sm-4 col-md-3"><a href="#" target="_blank"><img src="https://placeholdit.co//i/160x60?"></a></div>
				<div class="col-6 col-sm-4 col-md-3"><a href="#" target="_blank"><img src="https://placeholdit.co//i/160x60?"></a></div>
				<div class="col-6 col-sm-4 col-md-3"><a href="#" target="_blank"><img src="https://placeholdit.co//i/160x60?"></a></div>
				<div class="col-6 col-sm-4 col-md-3"><a href="#" target="_blank"><img src="https://placeholdit.co//i/160x60?"></a></div>
				<div class="col-6 col-sm-4 col-md-3"><a href="#" target="_blank"><img src="https://placeholdit.co//i/160x60?"></a></div>
				<div class="col-6 col-sm-4 col-md-3"><a href="#" target="_blank"><img src="https://placeholdit.co//i/160x60?"></a></div>
				<div class="col-6 col-sm-4 col-md-3"><a href="#" target="_blank"><img src="https://placeholdit.co//i/160x60?"></a></div>
			</div>

		</div>

		<a href="#" class="large-button js-load-cases">
			<span>View all clients</span>
		</a>
	</section> <!-- end clients  -->



</div>

<?php get_footer(); ?>

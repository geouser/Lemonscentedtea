<?php
/*
 * Template Name: About Us Template
 *
 * @package WordPress
 * @subpackage Lemon_Scented_Tea
 * @since Lemon Scented Tea 1.0
 */

get_header();

$page_id = get_the_ID();

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
					'posts_per_page' 	=> get_field( 'team_posts_per_page', $page_id ),
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
					posts_per_page: <?php the_field( 'team_posts_per_page', $page_id ); ?>,
					paged: 2,
					post_status: 'publish',
					max_pages: <?php echo $query->max_num_pages; ?>
				}
			</script>

			<?php if ( $query->max_num_pages > 1 ) : ?>
				<button class="large-button js-load-team">
					<span class="large-button__default-text"><?php _e('More lemons', 'lemonscentedtea'); ?></span>
					<span class="large-button__loading-text"><?php _e('Loading', 'lemonscentedtea'); ?>...</span>
					<span class="large-button__disabled-text"><?php _e('No more lemons', 'lemonscentedtea'); ?>...</span>
				</button>
			<?php endif; ?>

		<?php endif; ?>

		<?php wp_reset_postdata(); ?>
	</section> <!-- end team -->
		

	
	<?php if ( $clients = get_field('clients') ) : ?>
		
		<section class="clients">
			<div class="container">
				
				<div class="row justify-content-start align-items-center">

					<?php $counter = 1; ?>

					<?php foreach ( $clients as $client ) : ?>

						<?php 
							$classes = array( 'col-12', 'col-sm-6', 'col-md-6', 'col-lg-3', 'client-col' );

							if ( $counter > get_field( 'clients_to_show', $page_id ) ) {
								$classes[] = 'hidden';
							}
						?>
						
						<div class="<?php echo join( ' ', $classes ); ?>">

								<?php if ( $client['case_link'] ) : ?>
									<a href="<?php echo get_permalink( $client['case_link'] ); ?>">
										<img src="<?php echo $client['logo']['url'] ?>">
									</a>
								<?php elseif ( $client['custom_link'] ) : ?>
									<a href="<?php echo $client['custom_link']; ?>" target="_blank">
										<img src="<?php echo $client['logo']['url'] ?>">
									</a>
								<?php else : ?>
									<span>
										<img src="<?php echo $client['logo']['url'] ?>">
									</span>
								<?php endif; ?>

						</div>

						<?php $counter++; ?>

					<?php endforeach; ?>

				</div>

			</div>
				
			<?php if ( count($clients) > get_field( 'clients_to_show', $page_id ) ) : ?>
				<button class="large-button js-load-clients">
					<span class="large-button__default-text"><?php _e('View all clients', 'lemonscentedtea'); ?></span>
					<span class="large-button__disabled-text"><?php _e('No more clients', 'lemonscentedtea'); ?>...</span>
				</button>
			<?php endif; ?>

		</section> <!-- end clients  -->
	<?php endif; ?>



</div>

<?php get_footer(); ?>

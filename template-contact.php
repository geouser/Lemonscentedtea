<?php
/*
 * Template Name: Contact Page Template
 */

get_header();
?>




<div id="main">

	<div id="google-map" class="map"></div> <!-- end google map -->

	<section class="general-page">

		<div class="container">


			<div class="text-block contacts">
				<h2 class="text-block__title decorated-title"><?php the_field('address_title');?></h2>

				<div class="text-block__content">
					<div class="row">
						<div class="col-12 col-md-6">
							<div class="text-block-part">
								<address>
									<?php the_post(); the_content();?>
								</address>		
							</div>
							
						</div>
						<div class="col-12 col-md-6">	
							<div class="text-block-part">
								<ul class="text-block__socials">
								<?if( have_rows('socail') ):
									while ( have_rows('socail') ) : the_row(); ?>
										<li><a href="<?php the_sub_field('link');?>" target="_blank"><img src="<?php the_sub_field('icon');?>"><span><?php the_sub_field('text');?></span></a></li>
									<?
									endwhile; 
								endif; ?>
								</ul>	
							</div>
						</div>
					</div>
				</div>
			</div>	

		</div> <!-- end cantainer -->

	</section> <!-- end section -->




	<section class="vacancies">
		
		<div class="vacancies-container">

			<?
				$args = array(
					'post_type' => 'vacatures',
					'posts_per_page' => -1
				);

				$query = new WP_Query($args);

				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {  $query->the_post();?>
						<a href="<?php echo get_permalink();?>" class="vacancy">
							<figure class="vacancy__cover" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'case-thumbnail');?>')"></figure>

							<div class="text-block">
								<h2 class="text-block__title decorated-title"><?php _e('Hiring', 'lemonscentedtea'); ?>: <?php the_title(); ?></h2>

								<div class="text-block__content">
									<?php the_excerpt();?>
								</div>
							</div>
						</a>
					<?}
					wp_reset_postdata(); 
				} // end if query
			?>
			
		</div>

	</section> <!-- end vacancies -->



</div>

<?php get_footer(); ?>

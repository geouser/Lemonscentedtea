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
				<h2 class="text-block__title decorated-title">Lemon Scented Tea</h2>

				<div class="text-block__content">
					<div class="row">
						<div class="col-12 col-md-6">
							<div class="text-block-part">
								<address>
									<p>Kortre Prinsengracht 26, 1013 GS Amsterdam <br>lemonscentedtea.com <br>+31(0) 206 063 580 <br>Open now: 9AM-7PM</p>
									<p><strong>New business inquiries</strong> <br>E: gijsbregt@lemonscentedtea.com <br>M: +31(0) 655 123 673</p>
								</address>		
							</div>
							
						</div>
						<div class="col-12 col-md-6">	
							<div class="text-block-part">
								<ul class="text-block__socials">
									<li><a href="#" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/svg/icon-fcb.svg"><span>Facebook/lemonscentedtea</span></a></li>
									<li><a href="#" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/svg/icon-inst.svg"><span>Instgram.com/lemon-scented-tea</span></a></li>
									<li><a href="#" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/svg/icon-twtr.svg"><span>Twitter.com/lemonscentedtea</span></a></li>
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
								<h2 class="text-block__title decorated-title">Hiring: <?php the_title(); ?></h2>

								<div class="text-block__content">
									<p><?php the_excerpt();?></p>
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

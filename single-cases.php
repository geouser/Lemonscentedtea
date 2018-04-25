<?php
/*
 * Single case template
 *
 * @package WordPress
 * @subpackage Lemon_Scented_Tea
 * @since Lemon Scented Tea 1.0
 */

get_header();

?>

<div id="main">
		
	<section class="single-case">
		


			<article class="single-case__aticle">

				<div class="container">
					<div class="single-case-heading">
						<h1 class="single-case__title"><?php the_title();?></h1>
						<h2 class="single-case__subtitle"><?php the_field('subtitle')?></h2>	
					</div>	
				</div>

				<?php echo get_template_part('parts/part', 'flexible-content'); ?>

			</article>	

			
			<div class="single-case__footer">
				<a href="#" class="large-button get-in-touch">
					<span class="label">Get in touch</span>

					<span class="desc">
						<span class="desc__main">Call: +31 (0) 20 606 3580</span>
						<span class="desc__second">E-mail: info@lemonscentedtea.com</span>
					</span>
				</a>
				<a href="#" class="large-button next-case has-bg" style="background-image: url(https://unsplash.it/720/450?image=64);">
					<span class="label">Next case</span>

					<span class="desc">
						<span class="desc__main">Lorem ipsum.</span>
						<span class="desc__second">Lorem ipsum dolor sit.</span>
					</span>
				</a>
			</div>

		
		
	</section>
	
</div> <!-- end #main -->

<?php get_footer(); ?>

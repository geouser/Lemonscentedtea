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
		
		<div class="container">
			
			<?php get_template_part('parts/part', 'flexible-content'); ?>

		</div> <!-- end container -->
		
	</section>


	<section class="team">
		
		<div class="team-container">
			
			<a href="#" class="team-member">

				<img src="https://unsplash.it/720/450?image=35" alt="" class="team-member__image">

				<span class="team-member__desc">
					<span class="team-member__desc__name">Gijs Vijn</span>
					<span class="team-member__desc__position">CEO</span>
				</span>
			</a>

			<a href="#" class="team-member">

				<img src="https://unsplash.it/720/450?image=35" alt="" class="team-member__image">
				
				<span class="team-member__desc">
					<span class="team-member__desc__name">Gijs Vijn</span>
					<span class="team-member__desc__position">CEO</span>
				</span>
			</a>

			<a href="#" class="team-member">

				<img src="https://unsplash.it/720/450?image=35" alt="" class="team-member__image">
				
				<span class="team-member__desc">
					<span class="team-member__desc__name">Gijs Vijn</span>
					<span class="team-member__desc__position">CEO</span>
				</span>
			</a>

			<a href="#" class="team-member">

				<img src="https://unsplash.it/720/450?image=35" alt="" class="team-member__image">
				
				<span class="team-member__desc">
					<span class="team-member__desc__name">Gijs Vijn</span>
					<span class="team-member__desc__position">CEO</span>
				</span>
			</a>

		</div>


		<button class="large-button js-load-cases">
			<span>More lemons</span>
		</button>
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

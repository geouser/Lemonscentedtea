<?php
/*
 * Template Name: Contact Page Template
 */

get_header();
?>




<div id="main">

	<div id="google-map" class="map"></div> <!-- end google map -->

	<section>

		<div class="container">


			<div class="text-block">
				<h2 class="text-block__title decorated-title">Lemon Scented Tea</h2>

				<div class="text-block__content">
					<div class="row">
						<div class="col-12 col-md-6">
							<address>
								<p>Kortre Prinsengracht 26, 1013 GS Amsterdam <br>lemonscentedtea.com <br>+31(0) 206 063 580 <br>Open now: 9AM-7PM</p>
								<p><strong>New business inquiries</strong> <br>E: gijsbregt@lemonscentedtea.com <br>M: +31(0) 655 123 673</p>
							</address>	
						</div>
						<div class="col-12 col-md-6">	
							<ul class="text-block__socials">
								<li><a href="#" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/svg/icon-fcb.svg"><span>Facebook/lemonscentedtea</span></a></li>
								<li><a href="#" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/svg/icon-inst.svg"><span>Instgram.com/lemon-scented-tea</span></a></li>
								<li><a href="#" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/svg/icon-twtr.svg"><span>Twitter.com/lemonscentedtea</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>	


			<figure class="figure figure--double">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/jpg/contact-1.png">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/jpg/contact-2.png">
			</figure>
				

			<div class="text-block">
				<div class="row">
					<div class="col-12 col-md-6 col-xl-5">
						<h2 class="text-block__title decorated-title">Hiring: Social media expert</h2>

						<div class="text-block__content">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad hic fuga laudantium praesentium, esse voluptatibus natus eum eos tempore sequi commodi, quo temporibus rerum sapiente repellat rem odio. Libero, tempora.</p>
						</div>
					</div>
					<div class="col-xl-1"></div>
					<div class="col-12 col-md-6 col-xl-5">
						<h2 class="text-block__title decorated-title">Hiring: Nerd</h2>

						<div class="text-block__content">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad hic fuga laudantium praesentium, esse voluptatibus natus eum eos tempore sequi commodi, quo temporibus rerum sapiente repellat rem odio. Libero, tempora.</p>
						</div>
					</div>
				</div>
			</div>

		</div>

	</section> <!-- end section -->



</div>

<?php get_footer(); ?>

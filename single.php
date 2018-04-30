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
					<span class="label"><?php _e('Get in touch', 'lemonscentedtea'); ?></span>

					<span class="desc">
						<span class="desc__main"><?php _e('Call', 'lemonscentedtea'); ?>: <?php the_field('phone_number', 'option'); ?></span>
						<span class="desc__second"><?php _e('E-mail', 'lemonscentedtea'); ?>: <?php the_field('email_address', 'option'); ?></span>
					</span>
				</a>
				<?php 
					$next_post = get_previous_post( false, '');
					$next_post_id = $next_post->ID;
					$post_type = get_post_type();
					$next_word;
					switch ($post_type) {
						case 'post':
							$next_word = __('post', 'lemonscentedtea');
							break;
						case 'cases':
							$next_word = __('case', 'lemonscentedtea');
							break;
						case 'vacatures':
							$next_word = __('vacancy', 'lemonscentedtea');
							break;
					}

					if(!$next_post_id) {
						$args = array(
							'numberposts' => 1,
							'post_type' => $post_type,
						);
						$recent_posts = wp_get_recent_posts( $args, ARRAY_A );
						$next_post_id = $recent_posts[0]['ID'];
					}
				?>
				<a href="<?php echo get_permalink($next_post_id); ?>" class="large-button next-case has-bg" style="background-image: url(<?php echo get_the_post_thumbnail_url($next_post_id, 'next-preview')?>);">
					<span class="label"><?php _e('Next', 'lemonscentedtea'); ?> <?php echo $next_word;?></span>

					<span class="desc">
						<span class="desc__main"><?php echo get_the_title($next_post_id)?></span>
						<span class="desc__second"><?php the_field('subtitle', $next_post_id);?></span>
					</span>
				</a>
			</div>

		
		
	</section>
	
</div> <!-- end #main -->

<?php get_footer(); ?>
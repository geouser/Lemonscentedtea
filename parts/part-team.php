<div class="team-member">

	<?php 
		$image = get_the_post_thumbnail_url( get_the_ID(), 'case-thumbnail');
	?>

	<img src="<?php echo $image; ?>" alt="" class="team-member__image">

	<span class="team-member__desc">

		<a href="<?php the_field('linkedin_link'); ?>" target="_blank" class="linkedin">
			<svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				 viewBox="0 0 65 65" style="enable-background:new 0 0 65 65;" xml:space="preserve">
				<g id="LST_AboutPage">
					<g id="Page-1-Copy">
						<path id="Combined-Shape" class="st0" d="M32.2,0L65,32.8L32.8,65L0,32.2L32.2,0z M43,40.5v-7.7c0-0.1,0-0.1,0-0.2
							c-0.1-0.6-0.1-1.2-0.3-1.8c-0.2-0.7-0.6-1.4-1.2-2c-0.4-0.4-0.9-0.7-1.4-0.9c-0.7-0.3-1.4-0.3-2.2-0.3c-1.1,0.1-2.1,0.5-2.8,1.5
							c-0.1,0.2-0.3,0.4-0.4,0.6v-1.7h-4.1v12.6h0.2h3.7c0.2,0,0.2,0,0.2-0.2c0-2.2,0-4.5,0-6.7c0-0.7,0.1-1.3,0.5-1.8
							c0.6-0.8,1.6-1,2.5-0.7c0.6,0.2,0.9,0.7,1.1,1.4c0.1,0.5,0.2,1,0.2,1.5c0,2.1,0,4.3,0,6.4c0,0.2,0,0.2,0.2,0.2
							C40.4,40.5,41.7,40.5,43,40.5z M23.9,23.7v0.5c0.1,0.2,0.1,0.5,0.2,0.7c0.3,0.6,0.8,1,1.5,1.1c0.7,0.2,1.4,0.1,2-0.3
							c0.8-0.5,1-1.2,0.9-2.1c-0.1-0.8-0.5-1.4-1.3-1.7c-0.5-0.2-1.1-0.2-1.6-0.1c-0.6,0.1-1.1,0.5-1.4,1C24,23.1,24,23.4,23.9,23.7z
							 M28.2,40.5V27.9h-4.1V28c0,4.1,0,8.2,0,12.2c0,0.1,0,0.2,0.2,0.2c1.2,0,2.5,0,3.7,0H28.2z"/>
					</g>
				</g>
			</svg>	
		</a>
		
		<span class="team-member__desc__name"><?php the_title(); ?></span>
		<span class="team-member__desc__position"><?php the_field('position'); ?></span>
	</span>
</div>
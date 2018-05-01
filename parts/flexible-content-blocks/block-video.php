<?php 
	if (get_sub_field('youtube__vimeo')) {
		$video_url = get_sub_field('video_url');
		$video_cover = get_sub_field('video_cover');
		?>
		<div class="video-block">
			<a href="<?php echo $video_url; ?>" class="fancybox" style="background-image: url(<?php echo $video_cover['sizes']['figure']; ?>);"></a>
		</div>
	<?php } else { 
		if (get_sub_field('vimeo_url')) { ?>
			<div class="vimeo-container">
				<div data-vimeo-url="<?php the_sub_field('vimeo_url'); ?>" data-vimeo-width="100vw" id="vimeo"></div>
			</div>

			<script src="https://player.vimeo.com/api/player.js"></script>
			<script>
				var handstickPlayer = new Vimeo.Player('vimeo');
			</script>
		<?php }
	}
?>





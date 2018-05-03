<?php 
	if (get_sub_field('youtube__vimeo')) {
		$video_url = get_sub_field('video_url');
		$video_cover = get_sub_field('video_cover');
		?>
		<div class="video-block">
			<a href="<?php echo $video_url; ?>" class="fancybox" style="background-image: url(<?php echo $video_cover['sizes']['figure']; ?>);"></a>
		</div>
	<?php } else { 
		if (get_sub_field('vimeo_url')) { 
			$v_id = uniqid();
			$video_url = get_sub_field('vimeo_url');
			$video_id = substr($video_url, strrpos($video_url, '/') + 1);
			$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$video_id.php"));
			?>

			<div class="vimeo-container">
				<div class="vimeo-video" data-id="<?php echo $video_id; ?>" id="vimeo<?php echo $v_id;?>">
					<img class="vimeo-video__preview" src="<?php echo $hash[0]['thumbnail_large'];?>" alt="">
				</div>
			</div>

			<script src="https://player.vimeo.com/api/player.js"></script>
		<?php }
	}
?>





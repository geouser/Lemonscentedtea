<?php 
	$video_url = get_sub_field('video_url');

	$video_cover = get_sub_field('video_cover');
?>

<div class="video-block">
	<a href="<?php echo $video_url; ?>" class="fancybox" style="background-image: url(<?php echo $video_cover['sizes']['figure']; ?>);"></a>
</div>
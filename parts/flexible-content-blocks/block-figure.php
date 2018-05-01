<?php
	$image_caption = get_sub_field('image_caption');

	$imageID = get_sub_field('image');
	$image = wp_get_attachment_image_src( $imageID, 'figure_preview' );
	$image_full = wp_get_attachment_image_src( $imageID, 'figure' );
	$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
?>

<?php
if (!isset($_POST["window_width"]) && !isset($_SESSION['window_width'])) {
?>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="window_width_form" style="display:none;">
	<input name="window_width" id="window_width" value="" />
	</form>
	<script type="text/javascript">
		$(function(){
			$('#window_width').val($(window).width());
			$('#window_width_form').submit();
		});
	</script>   
<?php
}
elseif (isset($_POST['window_width']) && !isset($_SESSION['window_width']))
{
    $_SESSION['window_width'] = $_POST['window_width'];
    exit(header("Location: {$_SERVER['PHP_SELF']}\r\n"));
}
if(!isset($_POST["window_width"]) && !isset($_SESSION['window_width'])) {
    echo "not set";
}
if($_SESSION['window_width'])
    echo $_SESSION['window_width'];
?>

<?php if ( $image ) : ?>

	<figure class="figure placeholder" data-large="<?php echo $image_full[0]; ?>">
		
		<img src="<?php echo $image[0]; ?>" class="img-small" alt="<?php echo $alt_text; ?>">

		<?php if ( $image_caption ) : ?>
			<figcaption><?php echo $image_caption; ?></figcaption>
		<?php endif; ?>
		
	</figure>

<?php endif; ?>

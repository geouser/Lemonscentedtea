<a href="<?php echo get_permalink();?>" class="case">
    <?php
        $image_full = get_the_post_thumbnail_url(get_the_ID(), 'case-thumbnail');
        $image_800 = get_the_post_thumbnail_url(get_the_ID(), 'case-thumbnail__800');
        $image_small = get_the_post_thumbnail_url(get_the_ID(), 'case-thumbnail_preview');
    ?>
	<div class="case__cover__wrap">
		<figure class="case__cover"
            data-800="<?php echo $image_800; ?>"
            data-full="<?php echo $image_full; ?>">

            <img src="<?php echo $image_small; ?>" class="img-small" alt="<?php echo $alt_text; ?>">
	    </figure>	
	</div>
    
    <div class="case__desc">
        <h3 class="case__desc__title"><?php the_title();?></h3>
        <span class="case__desc__excerpt"><?php the_field('subtitle')?></span>
    </div>
</a>
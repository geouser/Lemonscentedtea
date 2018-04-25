<div class="container">
    <div class="text-block">
        <?php 
			$title = get_sub_field('title');
			$title_tag = get_sub_field('title_tag');
		?>
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="text-block-part">
                <?php if ( $title ) : ?>
                    <<?php echo $title_tag; ?> class="text-block__title decorated-title"><?php echo $title; ?></<?php echo $title_tag; ?>>
                <?php endif; ?>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="text-block-part">
                    <div class="text-block__content">
                        <?php the_sub_field('content'); ?>
                    </div>
                </div>
            </div>
        </div>
	
    </div>
</div>

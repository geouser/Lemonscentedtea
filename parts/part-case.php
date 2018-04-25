<a href="<?php echo get_permalink();?>" class="case">
    <figure class="case__cover" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'case-thumbnail');?>')">
    </figure>
    <div class="case__desc">
        <h3 class="case__desc__title"><?php the_title();?></h3>
        <span class="case__desc__excerpt"><?php the_field('subtitle')?></span>
    </div>
</a>
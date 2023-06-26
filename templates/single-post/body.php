<?php

  $color_photo = get_field('color_photo');

?>

<section class="article-body">                
    <?php if(get_the_post_thumbnail()): ?>
        <div class="featured-image<?php if($color_photo == TRUE): ?> photo-color<?php endif; ?>">
            <div class="photo-wrapper">
                <?php the_post_thumbnail(); ?>
            </div>
        
            <?php if(get_the_post_thumbnail_caption()): ?>
                <div class="caption">
                    <p><?php the_post_thumbnail_caption(); ?></p>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="copy copy-2 extended">
        <?php the_content(); ?>
    </div>
</section>
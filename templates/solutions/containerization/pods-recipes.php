<?php

    $pods_recipes_header = get_field('pods_recipes_header');
    $headline = $pods_recipes_header['headline'];
    $copy = $pods_recipes_header['copy'];

?>

<section class="pods-and-recipes grid">

    <div class="section-header center">
        <div class="headline">
            <h2 class="section-title"><?php echo $headline; ?></h2>
        </div>

        <div class="copy copy-2 secondary-color">
            <?php echo $copy; ?>
        </div>
    </div>

    <div class="gallery three-col-grid">
        <?php if(have_rows('pods_recipes_gallery')): while(have_rows('pods_recipes_gallery')) : the_row(); ?>

            <?php if( get_row_layout() == 'item' ): ?>

                <?php
                    $logo = get_sub_field('logo');
                    $copy = get_sub_field('copy');
                ?>

                <div class="item">
                    <div class="logo">
                        <?php echo wp_get_attachment_image($logo['ID'], 'full'); ?>
                    </div>

                    <div class="copy copy-3 secondary-color">
                        <?php echo $copy; ?>
                    </div>
                </div>

            <?php endif; ?>

        <?php endwhile; endif; ?>
    </div>
</section>
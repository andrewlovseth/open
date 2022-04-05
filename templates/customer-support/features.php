<?php

    $background_image = get_field('features_background');

?>

<section class="features grid icon-four-col" style="background-image: url(<?php echo $background_image['url']; ?>);">

    <?php
        $items = count(get_field('features'));
    ?>

    <div class="container items-<?php echo $items; ?>">

        <?php if(have_rows('features')): $count = 1; while(have_rows('features')) : the_row(); ?>

            <?php if( get_row_layout() == 'feature' ): ?>

                <?php
                    $icon = get_sub_field('icon');
                    $headline = get_sub_field('headline');
                    $copy = get_sub_field('copy');
                ?>

                <div class="item item-<?php echo $count; ?> feature">
                    <div class="item-content">
                        <div class="icon">
                            <?php echo wp_get_attachment_image($icon['ID'], 'full'); ?>
                        </div>

                        <div class="headline">
                            <h3><?php echo $headline; ?></h3>
                        </div>

                        <div class="copy copy-3 extended secondary-color">
                            <?php echo $copy; ?>
                        </div>
                    </div>
                </div>

            <?php endif; ?>
            
        <?php $count++; endwhile; endif; ?>

    </div>
</section>
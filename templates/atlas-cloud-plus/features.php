<section class="features grid icon-three-col">
    <div class="section-header">
        <div class="headline">
            <h2 class="section-title"><?php echo get_field('features_headline'); ?></h2>
        </div>

        <div class="copy copy-2 extended">
            <?php echo get_field('features_copy'); ?>
        </div>
    </div>

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
                    <div class="icon">
                        <?php echo wp_get_attachment_image($icon['ID'], 'full'); ?>
                    </div>

                    <div class="headline">
                        <h3 class="module-title"><?php echo $headline; ?></h3>
                    </div>

                    <div class="copy copy-3 extended">
                        <?php echo $copy; ?>
                    </div>
                </div>

            <?php endif; ?>
            
        <?php $count++; endwhile; endif; ?>

    </div>
</section>
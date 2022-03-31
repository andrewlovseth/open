<section class="features grid icon-three-col">
    <div class="section-header">
        <h2><?php the_field('features_section_header'); ?></h2>
    </div>

    <div class="container">
        <?php if(have_rows('features')): while(have_rows('features')): the_row(); ?>

            <?php
                $icon = get_sub_field('icon');
                $headline = get_sub_field('headline');
                $copy = get_sub_field('copy');
            ?>
        
            <div class="item feature">
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

        <?php endwhile; endif; ?>
    </div>
</section>
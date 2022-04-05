<?php

    $graphic = get_field('service_desktop_graphic');

?>

<div class="services-desktop">
    <div class="graphic">
        <?php echo wp_get_attachment_image($graphic['ID'], 'full'); ?>
    </div>
    

    <?php if(have_rows('services')): $count = 1; while(have_rows('services')) : the_row(); ?>

        <?php if( get_row_layout() == 'service' ): ?>

            <?php
                $icon = get_sub_field('icon_desktop');
                $name = get_sub_field('name');
                $slug = sanitize_title_with_dashes($name);
                $copy = get_sub_field('copy');
                $key_color = get_sub_field('key_color');
            ?>

            <a href="#" class="service service-<?php echo $count; ?>">
                <div class="icon">
                    <?php echo wp_get_attachment_image($icon['ID'], 'full'); ?>
                </div>

                <div class="info">
                    <h3 class="module-title"><?php echo $name; ?></h3>

                    <div class="link-label">More Info ></div>
                </div>
            </a>

        <?php endif; ?>

    <?php $count++; endwhile; endif; ?>
</div>
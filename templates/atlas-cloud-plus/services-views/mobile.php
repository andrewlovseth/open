<div class="services-mobile">
    <?php if(have_rows('services')): $count = 1; while(have_rows('services')) : the_row(); ?>

        <?php if( get_row_layout() == 'service' ): ?>

            <?php
                $icon = get_sub_field('icon_mobile');
                $name = get_sub_field('name');
                $slug = sanitize_title_with_dashes($name);
                $copy = get_sub_field('copy');
                $key_color = get_sub_field('key_color');
            ?>

            <div class="service service-<?php echo $count; ?>">
                <style>
                    .service-<?php echo $count; ?>:before {
                        background-color: <?php echo $key_color; ?>;
                    }
                </style>

                <div class="dot">
                    <div class="outer-circle" style="border-color: <?php echo $key_color; ?>;">
                        <div class="inner-circle" style="background-color: <?php echo $key_color; ?>;"></div>
                    </div>
                </div>

                <div class="info">
                    <div class="icon">
                        <?php echo wp_get_attachment_image($icon['ID'], 'full'); ?>
                    </div>

                    <div class="details">
                        <div class="headline">
                            <h3 class="module-title"><?php echo $name; ?></h3>
                        </div>

                        <div class="copy copy-2 extended secondary-color">
                            <?php echo $copy; ?>
                        </div>
                    </div>
                </div>
                
            </div>

        <?php endif; ?>

    <?php $count++; endwhile; endif; ?>
</div>
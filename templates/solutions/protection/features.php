<section class="features grid">
    <div class="section-header">
        <h2 class="small"><?php echo get_field('features_header'); ?></h2>
    </div>

    <div class="three-col-grid">

        <?php if(have_rows('features')): $count = 1; while(have_rows('features')) : the_row(); ?>

            <?php if( get_row_layout() == 'feature' ): ?>

                <?php
                    $icon = get_sub_field('icon');
                    $headline = get_sub_field('headline');
                    $copy = get_sub_field('copy');
                    $key_color = get_sub_field('key_color');
                    $hover_color = get_sub_field('hover_color');
                ?>

                <div class="feature feature-<?php echo $count; ?>">
                    <div class="icon">
                        <?php echo wp_get_attachment_image($icon['ID'], 'full'); ?>
                    </div>

                    <div class="headline">
                        <h3 class="module-title"><?php echo $headline; ?></h3>
                    </div>

                    <div class="copy copy-3 extended">
                        <?php echo $copy; ?>
                    </div>

                    <style>
                        body.page-template-solutions-protection section.features .feature-<?php echo $count; ?> {
                            border-bottom-color: <?php echo $key_color; ?>;
                        }
                        body.page-template-solutions-protection section.features .feature-<?php echo $count; ?>:hover {
                            background: <?php echo $hover_color; ?>;
                        }

                    </style>
                </div>

            <?php endif; ?>
            
        <?php $count++; endwhile; endif; ?>

    </div>
</section>
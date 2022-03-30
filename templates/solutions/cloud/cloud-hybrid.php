<?php

    $cloud_hybrid = get_field('cloud_hybrid');
    $section_header = $cloud_hybrid['section_header'];
    $section_sub_header = $cloud_hybrid['section_sub_header'];

    if(have_rows('cloud_hybrid')): while(have_rows('cloud_hybrid')): the_row();
    
?>

    <section class="cloud-hybrid grid">
        <div class="section-header center">
            <h2 class="section-title"><?php echo $section_header; ?></h2>
            <h3 class="copy copy-1"><?php echo $section_sub_header; ?></h3>
        </div>

        <div class="features">
            <?php if(have_rows('features')): $count = 1; while(have_rows('features')): the_row(); ?>

                <?php
                    $headline = get_sub_field('headline');
                    $icon = get_sub_field('icon');
                    $copy = get_sub_field('copy');
                    $top_border = get_sub_field('top_border');
                ?>

            
                <div class="feature feature-<?php echo $count; ?>">
                    <div class="feature-header">
                        <div class="headline">
                            <h3 class="module-title"><?php echo $headline; ?></h3>
                        </div>
    
                        <div class="icon">
                            <?php echo wp_get_attachment_image($icon['ID'], 'full'); ?>
                        </div>
                    </div>

                    <div class="copy copy-3 extended secondary-color">
                        <?php echo $copy; ?>
                    </div>

                    <?php if($top_border): ?>
                        <style>
                            .cloud-hybrid .feature:nth-child(<?php echo $count; ?>):before {
                                content: '';
                                display: block;
                                width: 100%;
                                height: 8px;
                                background: url(<?php echo $top_border['url']; ?>) no-repeat 0 0;
                                background-size: cover;
                                position: absolute;
                                top: -8px;
                                left: 0;
                            }
                        </style>

                    <?php endif; ?>
                </div>

            <?php $count++; endwhile; endif; ?>
        </div>
    </section>

<?php endwhile; endif; ?>
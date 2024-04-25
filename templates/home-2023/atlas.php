<?php

$section_headline = get_field('atlas_headline');
$section_dek = get_field('atlas_dek');
$section_link = get_field('atlas_link');

if(have_rows('atlas_features')): ?>

    <section class="atlas grid"> 
        <div class="section-header">
            <h2 class="section-title"><?php echo $section_headline; ?></h2>

            <div class="copy copy-3">
                <?php echo $section_dek; ?>
            </div>
            
            <?php 
                if( $section_link ): 
                $section_link_url = $section_link['url'];
                $section_link_title = $section_link['title'];
                $section_link_target = $section_link['target'] ? $section_link['target'] : '_self';
            ?>

                <div class="cta">
                    <a class="btn blue" href="<?php echo esc_url($section_link_url); ?>" target="<?php echo esc_attr($section_link_target); ?>"><?php echo esc_html($section_link_title); ?></a>
                </div>

            <?php endif; ?>

        </div>

        <div class="atlas__grid">
            <?php $count = 1; while(have_rows('atlas_features')) : the_row(); ?>

                <?php if( get_row_layout() == 'feature' ): ?>
                    <?php
                        $headline = get_sub_field('headline');
                        $copy = get_sub_field('copy');
                        $delay = 200 + (50 * $count);
                    ?>

                    <div class="atlas__item atlas__item-<?php echo $count; ?>" data-aos="fade-up" data-aos-duration="600" data-aos-delay="<?php echo $delay; ?>" data-aos-once="true">
                        <h3 class="atlas__headline"><?php echo $headline; ?></h3>

                        <div class="atlas__copy copy copy-3">
                            <?php echo $copy; ?>
                        </div>
                    </div>

                <?php endif; ?>

            <?php $count++; endwhile; ?>
        </div>
    </section>

<?php endif; ?>
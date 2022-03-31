<section class="uses grid">
    <div class="section-header center">
        <h2 class="section-title"><?php the_field('uses_header'); ?></h2>
    </div>

    <div class="uses-list">
        <?php if(have_rows('uses')): while(have_rows('uses')) : the_row(); ?>

            <?php if( get_row_layout() == 'use' ): ?>

                <?php
                    $photo = get_sub_field('photo');
                    $headline = get_sub_field('headline');
                    $copy = get_sub_field('copy');

                ?>

                <div class="use">
                    <div class="info">
                        <div class="headline">
                            <h3 class="module-title"><?php echo $headline; ?></h3>
                        </div>

                        <div class="copy copy-2 extended secondary-color">
                            <?php echo $copy; ?>
                        </div>

                        <?php if(have_rows('ctas')): while(have_rows('ctas')): the_row(); ?> 
                            <?php 
                                $link = get_sub_field('link');
                                if( $link ): 
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>

                                <div class="cta">
                                    <a class="basic blue arrow" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                                </div>

                            <?php endif; ?>

                        <?php endwhile; endif; ?>

                    </div>

                    <div class="photo">
                        <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
                    </div>
                </div>

            <?php endif; ?>

        <?php endwhile; endif; ?>
    </div>
</section>
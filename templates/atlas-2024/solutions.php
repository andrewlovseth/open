<?php

    $solutions = get_field('solutions');
    $headline = $solutions['headline'];
    $copy = $solutions['copy'];

 if(have_rows('solutions')): while(have_rows('solutions')): the_row(); ?>

    <section class="solutions grid">

        <?php if($headline): ?>
            <div class="solutions__headline | headline">
                <h2 class="section-title small"><?php echo $headline; ?></h2>
            </div>
        <?php endif; ?>

        <?php if($copy): ?>
            <div class="solutions__copy | copy copy-2 extended">
                <?php echo $copy; ?>
            </div>
        <?php endif; ?>

        <?php if(have_rows('features')): ?>
            <div class="solutions__features">
                <?php while(have_rows('features')): the_row(); ?>

                    <?php
                        $link = get_sub_field('link');
                        $image = get_sub_field('image');
                    ?>

                    <div class="solutions__feature">
                        <?php 
                            if( $link ): 
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                            
                            <a class="solutions__feature-link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                                <div class="solutions__feature-photo">
                                    <?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
                                </div>

                                <div class="solutions__feature-info">
                                    <h4 class="solutions__feature-title"><?php echo esc_html($link_title); ?></h4>

                                    <div class="play-btn">
                                        <?php get_template_part('src/svg/play-btn'); ?>
                                    </div>

                                </div>
                            </a>

                        <?php endif; ?>

                    </div>

                <?php endwhile; ?>
            </div>
        <?php endif; ?>

    </section>

<?php endwhile; endif; ?>

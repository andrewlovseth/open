<?php if(have_rows('hero')): ?>

    <section class="hero hero-swiper swiper">
        <div class="swiper-wrapper">

            <?php while(have_rows('hero')) : the_row(); ?>

                <?php if( get_row_layout() == 'slide' ): ?>
                    <?php
                        $headline = get_sub_field('headline');
                        $phrase = get_sub_field('phrase');
                        $image = get_sub_field('image');
                        $link = get_sub_field('link');
                    ?>

                    <div class="hero__slide swiper-slide">
                        <div class="hero__grid">
                            <div class="hero__info grid">
                                <h1 class="hero__headline">
                                    <?php echo $headline; ?>
                                    <div>
                                          <span class="hero__headline-phrase"><?php echo $phrase; ?></span>
                                    </div>
                                </h1>

                                <?php 
                                    if( $link ): 
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>

                                    <div class="hero__cta | cta">
                                        <a class="btn blue" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                                    </div>

                                <?php endif; ?>
                            </div>

                            <div class="hero__photo">
                                <div class="hero__photo-wrapper">
                                    <?php echo wp_get_attachment_image($image['ID'], 'large'); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endif; ?>

            <?php endwhile; ?>
        </div>

        <div class="swiper-pagination"></div>
    </section>

<?php endif; ?>
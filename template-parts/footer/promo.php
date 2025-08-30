<?php

    $demo = get_field('demo', 'options');
    $headline = $demo['headline'];
    $copy = $demo['copy'];
    $link = $demo['link'];

    $promo = get_field('promo', 'options');
    $image = $promo['image'];
    $url = $promo['url'];

?>

<section class="promo grid">
    <div class="promo__wrapper">
        <div class="demo">
            <div class="demo__container">
                <div class="demo__logo">
                    <?php get_template_part('src/svg/logo'); ?>
                </div>

                <h3 class="demo__headline"><?php echo $headline; ?></h3>

                <div class="demo__copy | copy copy-3 secondary-color extended">
                    <?php echo $copy; ?>
                </div>

                <?php
                    if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                ?>

                    <div class="cta">
                        <a class="btn blue" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                    </div>

                <?php endif; ?>

                <div class="rect-group top-left">
                    <div class="rect-orange"></div>
                    <div class="rect-red"></div>
                </div>

                <div class="rect-group top-right rect-yellow"></div>

                <div class="rect-group bottom-right">
                    <div class="rect-green"></div>
                    <div class="rect-purple"></div>
                </div>

            </div>
        </div>

        <div class="promo__card">
            <a href="<?php echo $url; ?>">
                <?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
            </a>
        </div>
    </div>

    <div class="promo__blob">
        <img src="<?php echo get_template_directory_uri(); ?>/src/images/home-2025/blob-blue-purple.jpg" role="presentation" alt="">
    </div>
</section>
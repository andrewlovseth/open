<?php

    $pre_footer = get_field('pre_footer', 'options');
    $headline = $pre_footer['headline'];
    $features = $pre_footer['features'];
    $ctas = $pre_footer['ctas'];

?>

<div class="pre-footer">
    <div class="pre-footer__container">
        <div class="pre-footer__logo">
            <?php get_template_part('src/svg/logo'); ?>
        </div>

        <div class="headline">
            <h3><?php echo $headline; ?></h3>
        </div>

        <ul>
            <?php foreach($features as $feature): ?>

                <li>
                    <span class="checkmark">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="20" height="20" rx="10" fill="#D1FADF"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.247 6.15838L8.2803 11.9167L6.69696 10.2251C6.4053 9.95005 5.94696 9.93338 5.61363 10.1667C5.28863 10.4084 5.19696 10.8334 5.39696 11.1751L7.27196 14.2251C7.4553 14.5084 7.77196 14.6834 8.1303 14.6834C8.47196 14.6834 8.79696 14.5084 8.9803 14.2251C9.2803 13.8334 15.0053 7.00838 15.0053 7.00838C15.7553 6.24172 14.847 5.56672 14.247 6.15005V6.15838Z" fill="#12B76A"/>
                        </svg>
                    </span>
                    <span class="text"><?php echo $feature['feature']; ?></span>
                </li>

            <?php endforeach; ?>
        </ul>

        <div class="ctas">
            <?php foreach($ctas as $cta): ?>
                <?php
                    $link = $cta['cta'];

                    if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                ?>

                    <div class="cta">
                        <a class="btn blue" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                    </div>

                <?php endif; ?>
            <?php endforeach; ?>
        </div>


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

    <div class="pre-footer__blob">
        <img src="<?php echo get_template_directory_uri(); ?>/src/images/home-2025/blob-blue-purple.jpg" role="presentation" alt="">
    </div>
</div>
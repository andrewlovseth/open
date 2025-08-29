<?php

    $hero = get_field('hero');
    $headline = $hero['headline'];
    $copy = $hero['copy'];
    $poster = $hero['poster'];
    $video_id = $hero['video_id'];

?>

<section class="hero-2025 hero grid">
    <img class="hero__rect-left" src="<?php echo get_template_directory_uri(); ?>/src/images/home-2025/rect-blue-green-vert.png" role="presentation" alt="">

    <div class="hero__content">
        <h1 class="hero__headline | section-headline-2025"><?php echo $headline; ?></h1>
        <div class="hero__copy | copy copy-2 secondary-color">
            <?php echo $copy; ?>
        </div>

        <div class="hero__video">
            <div class="hero__blob">
                <img src="<?php echo get_template_directory_uri(); ?>/src/images/home-2025/blob-orange-pink.jpg" role="presentation" alt="">
            </div>

            <div class="hero__video-poster">
                <a href="#" class="hero__video-poster-link | js-video-modal" data-micromodal-trigger="hero-video-modal">
                    <?php get_template_part('src/svg/youtube-play-btn'); ?>
                    <?php echo wp_get_attachment_image($poster['ID'], 'full'); ?>
                </a>

            </div>
            <div class="hero__video-frame">
                <img src="<?php echo get_template_directory_uri(); ?>/src/images/home-2025/macbook-frame.png" role="presentation" alt="">
            </div>
        </div>
    </div>

    <div class="modal video-modal hero-video-modal micromodal-slide" id="hero-video-modal" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="hero-video-modal-title" >
                <header class="modal__header">
                    <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                </header>

                <div class="modal__content" id="hero-video-modal-content">
                    <div class="video-player youtube-video-player" data-autoplay-url="https://www.youtube-nocookie.com/embed/<?php echo $video_id; ?>?autoplay=1&modestbranding=1&rel=0">
                        <div class="embed">
                            <iframe width="1920" height="1080" allowfullscreen allow="autoplay" frameborder="0" allowTransparency="true" src=""></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</section>
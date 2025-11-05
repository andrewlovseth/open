<?php

    $about = get_field('about');
    $sub_header = $about['sub_header'];
    $headline = $about['headline'];
    $copy_1 = $about['copy_1'];
    $photo_1 = $about['photo_1'];
    $copy_2 = $about['copy_2'];
    $poster = $about['photo_2'];
    $video_id = $about['video_id'];
    $video_caption = $about['video_caption'];
?>

<section class="about grid">
    <div class="about__editorial about__editorial-1">
        <div class="about__info">
            <h4 class="about__sub-header"><?php echo $sub_header; ?></h4>
            <h2 class="about__headline | section-headline-2025"><?php echo $headline; ?></h2>

            <div class="about__copy | copy copy-2 secondary-color extended">
                <?php echo $copy_1; ?>
            </div>
        </div>

        <div class="about__image">
            <?php echo wp_get_attachment_image($photo_1['ID'], 'full'); ?>
        </div>
    </div>

    <div class="about__editorial about__editorial-2">
        <div class="about__info">
            <div class="about__copy | copy copy-2 secondary-color extended">
                <?php echo $copy_2; ?>
            </div>
        </div>


        <div class="about__video">
            <a href="#" class="about__video-link | js-video-modal" data-micromodal-trigger="about-video-modal">
                <?php get_template_part('src/svg/youtube-play-btn'); ?>
                <?php echo wp_get_attachment_image($poster['ID'], 'full'); ?>
            </a>
            <?php if($video_caption): ?>
                <div class="about__video-caption | copy copy-4 secondary-color">
                    <p><?php echo $video_caption; ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="modal video-modal about-video-modal micromodal-slide" id="about-video-modal" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="about-video-modal-title" >
                <header class="modal__header">
                    <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                </header>

                <div class="modal__content" id="about-video-modal-content">
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
<?php

    $headline = get_sub_field('headline');
    $copy = get_sub_field('copy');
    $video = get_sub_field('video');
    $form = get_sub_field('form');

?>

<section class="video-form grid">
    <div class="video-form__video">
        <h3 class="video-form__header"><?php echo $headline; ?></h3>

        <div class="video-form__copy | copy copy-2">
            <?php echo $copy; ?>
        </div>

        <div class="video-form__player">

            <?php
                $thumbnail = get_field('video_thumbnail', $video->ID);
                $source = get_field('video_source', $video->ID);
                $video_id = get_field('video_video_id', $video->ID);
                $slug = $video->post_name;
            ?>

            <?php if($thumbnail): ?>
                <div class="thumbnail">
                    <a href="#" class="js-video-modal" data-micromodal-trigger="<?php echo $slug; ?>-modal">
                        <div class="play-btn">
                            <div class="play-btn-wrapper">
                                <?php get_template_part('src/svg/icon-play-btn'); ?>
                            </div>
                        </div>

                        <div class="poster">
                            <?php echo wp_get_attachment_image($thumbnail['ID'], 'full'); ?>
                        </div>
                    </a>
                </div>
            <?php endif; ?>


            <div class="modal video-modal <?php echo $slug; ?>-modal micromodal-slide" id="<?php echo $slug; ?>-modal" aria-hidden="true">
                <div class="modal__overlay" tabindex="-1" data-micromodal-close>
                    <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="<?php echo $slug; ?>-modal-title" >

                        <header class="modal__header">
                            <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                        </header>

                        <div class="modal__content" id="<?php echo $slug; ?>-modal-content">
                            <?php if($source['value'] === 'vimeo'): ?>
                                <div class="video-player vimeo-video-player" data-autoplay-url="https://player.vimeo.com/video/<?php echo $video_id; ?>&autoplay=1&loop=1&autopause=0">
                                    <div class="embed">
                                        <iframe src="" width="1920" height="1080" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if($source['value'] === 'youtube'): ?>
                                <div class="video-player youtube-video-player" data-autoplay-url="https://www.youtube.com/embed/<?php echo $video_id; ?>?autoplay=1&modestbranding=1&rel=0">
                                    <div class="embed">
                                        <iframe width="1920" height="1080" allowfullscreen allow="autoplay" frameborder="0" allowTransparency="true" src=""></iframe>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="video-form__form">
        <?php echo $form; ?>
    </div>
</section>
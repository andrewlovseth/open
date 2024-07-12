<?php

    $hero = get_field('hero');
    $background = $hero['background'];

    $logo = $hero['logo'];
    $headline = $hero['headline'];
    $sub_headline = $hero['sub_headline'];
    $copy = $hero['copy'];
    $sub_copy = $hero['sub_copy'];
    $copy = $hero['copy'];
    $video = $hero['video'];
    $video_thumbnail = $hero['video_thumbnail'];

if(have_rows('hero')): while(have_rows('hero')): the_row(); ?>

<section class="hero grid">
    <div class="hero__background">
        <?php echo wp_get_attachment_image($background['ID'], 'full'); ?>
    </div>

    <div class="hero__info">
        <div class="hero__logo">
            <?php get_template_part('src/svg/logo-atlas-orange'); ?>
        </div>

        <div class="hero__header">
            <h1 class="hero__headline"><?php echo $headline; ?></h1>
            <h2 class="hero__sub-headline copy copy-2"><?php echo $sub_headline; ?></h2>
        </div>

        <div class="hero__copy copy copy-2">
            <?php echo $copy; ?>
        </div>

        <?php if(have_rows('buttons')): ?>

            <div class="hero__buttons">
                <?php while(have_rows('buttons')): the_row(); ?>

                    <?php 
                        $link = get_sub_field('link');
                        if( $link ): 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>

                        <div class="cta">
                            <a class="btn alt" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                        </div>

                    <?php endif; ?>


                <?php endwhile; ?>
            </div>
        
        <?php endif; ?>

        <div class="hero__sub-copy copy copy-2">
            <?php echo $sub_copy; ?>
        </div>

    </div>

    <div class="hero__video">
        <div class="hero__logo-outline">
            <?php get_template_part('src/svg/o-logo-outline'); ?>
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
                                <div class="video-player vimeo-video-player" data-autoplay-url="https://player.vimeo.com/video/<?php echo $video_id; ?>&autoplay=1&loop=1&autopause=0dnt=1">
                                    <div class="embed">
                                        <iframe src="" width="1920" height="1080" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if($source['value'] === 'youtube'): ?>
                                <div class="video-player youtube-video-player" data-autoplay-url="https://www.youtube-nocookie.com/embed/<?php echo $video_id; ?>?autoplay=1&modestbranding=1&rel=0">
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

</section>


<?php endwhile; endif; ?>

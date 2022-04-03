<?php

    $args = wp_parse_args($args);

    if(!empty($args)) {
        $types = $args['types']; 
        $icons = $args['icons']; 
    }

    $video = get_field('video');
    $description = $video['caption'];
    $thumbnail = $video['thumbnail'];
    $source = $video['source'];
    $video_id = $video['video_id'];
    $length = $video['length'];
    $slug = $post->post_name;
    $date_obj = DateTime::createFromFormat('Y-m-d H:i:s', $post->post_date);
    $date = $date_obj->format('m/d/Y');

?>

<article class="resource video">
    <?php if($icons): ?>
        <div class="icon">
            <?php echo print_svg($icons[0]['url']); ?>
        </div>
    <?php endif; ?>

    <div class="info">
        <?php if($types): ?>
            <h4 class="types">
                <span class="type"><?php echo $types[0]; ?></span>
            </h4>
        <?php endif; ?>

        <div class="headline">
            <h3 class="title">
                <a href="#" class="js-video-modal" data-micromodal-trigger="<?php echo $slug; ?>-modal">
                    <?php the_title(); ?>
                </a>
            </h3>
        </div>

        <?php if($description): ?>
            <div class="description copy copy-2 extended secondary-color">
                <?php echo $description; ?>
            </div>
        <?php endif; ?>

        <div class="cta">
            <a href="#" class="js-video-modal underline" data-micromodal-trigger="<?php echo $slug; ?>-modal">
                Watch <?php echo $types[0]; ?>
            </a>
        </div>

            <div class="meta copy copy-3">
                <p>
                    <?php if($source['label']): ?>
                        <span class="source"><strong>Source: </strong> <em><?php echo $source['label']; ?></em></span>
                    <?php endif; ?>

                    <?php if($length): ?>
                        <span class="length"><strong>Length: </strong> <em><?php echo $length; ?></em></span>
                    <?php endif; ?>

                    <?php if($date): ?>
                        <span class="date"><strong>Date Modified:</strong> <em><?php echo $date; ?></em></span>
                    <?php endif; ?>
                </p>
            </div>

    </div>

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

</article>
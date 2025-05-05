<?php

    $why = get_field('why');
    $headline = $why['headline'];
    $copy = $why['copy'];
    $link = $why['link'];
    $video_embed = $why['video_embed'];

?>

<section class="why grid">

    <div class="info">
        <?php if($headline): ?>
            <div class="headline">
                <h2 class="section-title"><?php echo $headline; ?></h2>
            </div>
        <?php endif; ?>

        <?php if($copy): ?>
            <div class="copy copy-2 extended color-secondary">
                <?php echo $copy; ?>
            </div>
        <?php endif; ?>

        <?php 
            if( $link ): 
            $link_title = $link['title'];
        ?>

            <div class="cta">
                <a class="btn blue js-form-trigger" href="#" data-micromodal-trigger="channel"><?php echo esc_html($link_title); ?></a>
            </div>

        <?php endif; ?>
    </div>

    <?php if($video_embed): ?>
        <div class="video">
            <?php echo $video_embed; ?>
        </div>
    <?php endif; ?>


</section>
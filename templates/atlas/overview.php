<?php

    $overview = get_field('overview');
    $headline = $overview['headline'];
    $deck = $overview['deck'];
    $photo = $overview['photo'];
    $link = $overview['cta'];

?>

<section class="overview grid">

    <div class="info">
        <?php if($headline): ?>
            <div class="headline">
                <h2 class="section-title"><?php echo $headline; ?></h2>
            </div>
        <?php endif; ?>

        <?php if($deck): ?>
            <div class="copy copy-2 deck">
                <?php echo $deck; ?>
            </div>
        <?php endif; ?>

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

    </div>

    <?php if($photo): ?>
        <div class="photo">
            <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
        </div>
    <?php endif; ?>



</section>
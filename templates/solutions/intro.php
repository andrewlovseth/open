<?php

    $intro = get_field('intro');
    $photo = $intro['photo'];
    $headline = $intro['headline'];
    $copy = $intro['copy'];
    $sub_headline = $intro['sub_headline'];
    $link = $intro['link'];

?>

<section class="intro solutions-intro grid">

    <?php if($photo): ?>
        <div class="photo">
            <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
        </div>
    <?php endif; ?>

    <div class="info">
        <?php if($headline): ?>
            <div class="headline">
                <h2 class="section-title"><?php echo $headline; ?></h2>
            </div>
        <?php endif; ?>

        <?php if($sub_headline): ?>
            <div class="sub-headline">
                <h3 class="sub-headline"><?php echo $sub_headline; ?></h3>
            </div>
        <?php endif; ?>

        <?php if($copy): ?>
            <div class="copy copy-2 extended color-secondary">
                <?php echo $copy; ?>
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





</section>
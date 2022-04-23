<?php

    $intro = get_field('intro');
    $photo = $intro['photo'];
    $headline = $intro['headline'];
    $copy = $intro['copy'];

    $portal = get_field('portal');
    $portal_headline = $portal['headline'];
    $portal_link = $portal['link'];

?>


<section class="portal-link grid">
    <div class="container">
        <div class="headline">
            <h4><?php echo $portal_headline; ?></h4>
        </div>

        <?php 
            if( $portal_link ): 
            $portal_link_url = $portal_link['url'];
            $portal_link_title = $portal_link['title'];
            $portal_link_target = $portal_link['target'] ? $portal_link['target'] : '_self';
        ?>

            <div class="cta">
                <a class="btn white-outline" href="<?php echo esc_url($portal_link_url); ?>" target="<?php echo esc_attr($portal_link_target); ?>"><?php echo esc_html($portal_link_title); ?></a>
            </div>

        <?php endif; ?>

    </div>
</section>


<section class="intro grid">

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
    </div>

    <?php if($photo): ?>
        <div class="photo">
            <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
        </div>
    <?php endif; ?>
    
</section>
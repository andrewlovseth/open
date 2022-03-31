<?php
    $difference = get_field('difference');
    $headline = $difference['headline'];
    $copy = $difference['copy'];
    $photo = $difference['photo'];
    $link = $difference['link'];
?>


<section class="difference grid">

    <div class="photo">
        <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
    </div>

    <div class="info">
        <div class="headline">
            <h3 class="module-title"><?php echo $headline; ?></h3>
        </div>

        <div class="copy copy-2 extended secondary-color">
            <?php echo $copy; ?>
        </div>

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
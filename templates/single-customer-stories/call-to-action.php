<?php

    $cta = get_field('cta');
    $show = $cta['show'];
    $icon = $cta['icon'];
    $headline = $cta['headline'];
    $copy = $cta['copy'];
    $link = $cta['link'];

    if($show === TRUE): 

?>

    <section class="call-to-action">
        <div class="icon">
            <?php echo wp_get_attachment_image($icon['ID'], 'full'); ?>
        </div>

        <div class="info">
            <div class="headline">
                <h3><?php echo $headline; ?></h3>
            </div>

            <div class="copy copy-3">
                <?php echo $copy; ?>
            </div>
        </div>

        <?php 
            if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
        ?>

            <div class="cta">
                <a class="btn white-outline" href="#" data-micromodal-trigger="contact"><?php echo esc_html($link_title); ?></a>
            </div>

        <?php endif; ?>
    </section>

<?php endif; ?>
<?php
    $why = get_field('why');
    $show = $why['show'];
    $headline = $why['headline'];
    $copy = $why['copy'];
    $photo = $why['photo'];
    $link = $why['link'];

    if($show):
?>

    <section class="why grid">
        <div class="why__info">
            <h2 class="why__title | section-title">
                <?php echo $headline; ?>
            </h2>

            <div class="why__copy | copy copy-2 extended">
                <?php echo $copy; ?>
            </div>
        </div>

        <div class="why__media">
            <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>

            <?php 
                if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
            ?>

                <div class="why__cta | cta">
                    <a class="btn blue" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                </div>

            <?php endif; ?>
        </div>
    </section>

<?php endif; ?>
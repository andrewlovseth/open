<?php

    $cta = get_field('cta');
    $headline = $cta['main_headline'];
    $main_copy = $cta['main_copy'];
    $supporting_copy = $cta['supporting_copy'];
    $link = $cta['link'];
    $link_copy = $cta['link_copy'];

?>

<section class="call-to-action | grid">
    <div class="call-to-action__header | section-header">
        <h3 class="call-to-action__title | section-title small"><?php echo $headline; ?></h3>

        <div class="call-to-action__copy | copy copy-1 extended">
            <?php echo $main_copy; ?>
        </div>
    </div>

    <div class="call-to-action__info">
        <div class="call-to-action__supporting-copy | copy copy-2 extended">
            <?php echo $supporting_copy; ?>
        </div>

        <?php 
            if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
        ?>

            <div class="call-to-action__cta | cta">
                <a class="btn blue" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            </div>

        <?php endif; ?>

        <div class="call-to-action__cta-copy | copy copy-3">
            <p><?php echo $link_copy; ?></p>
        </div>

    </div>

</section>
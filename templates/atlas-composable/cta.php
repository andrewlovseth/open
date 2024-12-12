<?php

    $cta = get_field('cta');
    $headline = $cta['headline'];
    $copy = $cta['copy'];
    $link = $cta['link'];

?>

<section class="cta grid">

    <?php if($headline): ?>
        <div class="cta__headline | headline">
            <h2 class="section-title"><?php echo $headline; ?></h2>
        </div>
    <?php endif; ?>

    <?php if($copy): ?>
        <div class="cta__copy | copy copy-2 extended">
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

</section>
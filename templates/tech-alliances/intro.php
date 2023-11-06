<?php

    $intro = get_field('intro');
    $headline = $intro['headline'];
    $copy = $intro['copy'];
    $link = $intro['link'];

?>

<section class="intro grid">

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
            <a class="btn blue js-form-trigger" href="#" data-micromodal-trigger="tech-alliance"><?php echo esc_html($link_title); ?></a>
        </div>

    <?php endif; ?>

</section>
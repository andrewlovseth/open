<?php

    $intro = get_field('intro');
    $photo = $intro['photo'];
    $headline = $intro['headline'];
    $copy = $intro['copy'];

?>

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
<?php

    $hero = get_field('hero');
    $headline = $hero['headline'];
    $copy = $hero['copy'];
    $photo = $hero['photo'];

?>

<section class="hero">
    <div class="hero__content">
        <h1 class="hero__headline | section-headline-2025"><?php echo $headline; ?></h1>
        <div class="hero__copy | copy copy-2 secondary-color">
            <?php echo $copy; ?>
        </div>
    </div>
    
    <div class="hero__photo">
        <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
    </div>
</section>
<?php

    $hero = get_field('hero');
    $headline = $hero['headline'];
    $copy_1 = $hero['copy_1'];
    $image = $hero['image'];
    $copy_2 = $hero['copy_2'];
    $form = $hero['form'];

?>

<section class="hero grid">
    <div class="hero__content">
        <?php if($headline): ?>
            <h1 class="hero__headline | section-headline-2025"><?php echo $headline; ?></h1>
        <?php endif; ?>

        <?php if($copy_1): ?>
            <div class="hero__copy-1 | copy copy-2 secondary-color extended">
                <?php echo $copy_1; ?>
            </div>
        <?php endif; ?>

        <?php if($image): ?>
            <div class="hero__image">
                <?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
            </div>
        <?php endif; ?>

        <?php if($copy_2): ?>
            <div class="hero__copy-2 | copy copy-2 secondary-color extended">
                <?php echo $copy_2; ?>
            </div>
        <?php endif; ?>
    </div>

    <?php if($form): ?>
        <div class="hero__form">
            <?php echo $form; ?>
        </div>
    <?php endif; ?>
</section>

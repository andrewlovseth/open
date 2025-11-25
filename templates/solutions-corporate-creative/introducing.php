<?php

    $introducing = get_field('introducing');
    $background_image = $introducing['background_image'];
    $logo = $introducing['logo'];
    $headline = $introducing['headline'];
    $copy_1 = $introducing['copy_1'];
    $copy_2 = $introducing['copy_2'];

?>

<section class="introducing grid">
    <div class="introducing__hero">
        <?php if($background_image): ?>
            <div class="introducing__background">
                <?php echo wp_get_attachment_image($background_image['ID'], 'full'); ?>
            </div>
        <?php endif; ?>

        <div class="introducing__content">
            <?php if($logo): ?>
                <div class="introducing__logo">
                    <?php echo wp_get_attachment_image($logo['ID'], 'full'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php if($copy_2): ?>
        <div class="introducing__info">        
            <?php if($headline): ?>
                <h3 class="introducing__headline section-headline-2025"><?php echo $headline; ?></h3>
            <?php endif; ?>

            <div class="introducing__copy-2 | copy copy-3 secondary-color extended">
                <?php echo $copy_2; ?>
            </div>
        </div>
    <?php endif; ?>
</section>

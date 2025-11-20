<?php

    $introducing = get_field('introducing');
    $background_image = $introducing['background_image'];
    $logo = $introducing['logo'];
    $headline = $introducing['headline'];
    $copy_1 = $introducing['copy_1'];
    $copy_2 = $introducing['copy_2'];

?>

<section class="introducing" <?php if($background_image): ?>style="background-image: url('<?php echo $background_image['url']; ?>');"<?php endif; ?>>
    <div class="introducing__content grid">
        <div class="introducing__left">
            <?php if($logo): ?>
                <div class="introducing__logo">
                    <?php echo wp_get_attachment_image($logo['ID'], 'full'); ?>
                </div>
            <?php endif; ?>

            <?php if($headline): ?>
                <h2 class="introducing__headline | section-headline-2025"><?php echo $headline; ?></h2>
            <?php endif; ?>
        </div>

        <div class="introducing__right">
            <?php if($copy_1): ?>
                <div class="introducing__copy-1 | copy copy-2 secondary-color extended">
                    <?php echo $copy_1; ?>
                </div>
            <?php endif; ?>

            <?php if($copy_2): ?>
                <div class="introducing__copy-2 | copy copy-2 secondary-color extended">
                    <?php echo $copy_2; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php

    $hardware_options = get_field('hardware_options');
    $headline = $hardware_options['headline'];
    $copy_1 = $hardware_options['copy_1'];
    $image = $hardware_options['image'];
    $graphic = $hardware_options['graphic'];
    $copy_2 = $hardware_options['copy_2'];

?>

<section class="hardware-options grid">
    <div class="hardware-options__top">
        <div class="hardware-options__top-content">
            <?php if($headline): ?>
                <h2 class="hardware-options__headline | section-headline-2025"><?php echo $headline; ?></h2>
            <?php endif; ?>

            <?php if($copy_1): ?>
                <div class="hardware-options__copy-1 | copy copy-2 secondary-color extended">
                    <?php echo $copy_1; ?>
                </div>
            <?php endif; ?>
        </div>

        <?php if($image): ?>
            <div class="hardware-options__image">
                <?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
            </div>
        <?php endif; ?>
    </div>

    <?php if($graphic): ?>
        <div class="hardware-options__graphic">
            <?php echo wp_get_attachment_image($graphic['ID'], 'full'); ?>
        </div>
    <?php endif; ?>

    <?php if($copy_2): ?>
        <div class="hardware-options__copy-2 | copy copy-2 secondary-color extended">
            <?php echo $copy_2; ?>
        </div>
    <?php endif; ?>

    <img class="hardware-options__rect-right" src="<?php echo get_template_directory_uri(); ?>/src/images/home-2025/rect-blue-blue-vert.png" role="presentation" alt="">

</section>

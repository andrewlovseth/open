<?php

    $early_adopters = get_field('early_adopters');
    $headline = $early_adopters['headline'];
    $copy = $early_adopters['copy'];
    $photo = $early_adopters['photo'];

?>

<section class="early-adopters grid">
    <div class="early-adopters__content">
        <div class="early-adopters__image">
            <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
        </div>

        <div class="early-adopters__info">
            <h4 class="early-adopters__headline"><?php echo $headline; ?></h4>

            <div class="early-adopters__copy | copy copy-2 secondary-color extended">
                <?php echo $copy; ?>
            </div>
        </div>
    </div>
</section>
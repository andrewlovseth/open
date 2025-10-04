<?php

    $features = get_field('features');
    $headline = $features['headline'];
    $copy = $features['copy'];
    $photo = $features['photo'];

?>

<section class="features grid">

    <?php if($photo): ?>
        <div class="features__image">
            <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
        </div>
    <?php endif; ?>

    <div class="features__info">
        <h3 class="features__headline copy-2"><?php echo $headline; ?></h3>

        <div class="features__copy | copy copy-2 secondary-color extended">
            <?php echo $copy; ?>
        </div>
    </div>
</section>
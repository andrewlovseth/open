<?php

    $customers = get_field('customers');
    $headline = $customers['headline'];
    $gallery = $customers['gallery'];
?>

<section class="customers grid">
    <div class="customers__content">
        <h1 class="customers__headline"><?php echo $headline; ?></h1>
        <div class="customers__copy | copy copy-4">
            <?php echo $dek; ?>
        </div>

        <div class="customers__gallery">
            <?php foreach($gallery as $image): ?>
                <div class="customers__gallery-item">
                    <?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
                </div>
            <?php endforeach; ?>
        </div>

    </div>

</section>
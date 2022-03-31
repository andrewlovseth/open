<?php

    $data_protection = get_field('data_protection');
    $headline = $data_protection['headline'];
    $copy = $data_protection['copy'];
    $photo = $data_protection['photo'];

?>

<section class="data-protection">
    <div class="info">
        <div class="info-wrapper">
            <div class="headline">
                <h3 class="section-title"><?php echo $headline; ?></h3>
            </div>

            <div class="copy copy-2 secondary-color">
                <?php echo $copy; ?>
            </div>
        </div>
    </div>

    <div class="photo">
        <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
    </div>
</section>
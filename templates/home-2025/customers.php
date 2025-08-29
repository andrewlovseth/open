<?php

    $customers = get_field('customers');
    $headline = $customers['headline'];
    $dek = $customers['dek'];
    $gallery = $customers['gallery'];
?>

<section class="customers grid">
    <div class="customers__content">
        <h1 class="customers__headline | section-headline-2025"><?php echo $headline; ?></h1>
        <div class="customers__copy | copy copy-2 secondary-color">
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
    <img class="customers__rect-right" src="<?php echo get_template_directory_uri(); ?>/src/images/home-2025/rect-pink-orange-vert.png" role="presentation" alt="">

</section>
<?php

    $tenets = get_field('tenets');
    $headline = $tenets['headline'];
    $image = $tenets['image'];

?>

<section class="tenets grid">
    <h3 class="tenets__headline | section-headline-2025"><?php echo $headline; ?></h3>

    <div class="tenets__image">
        <?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
    </div>

    <img class="tenets__rect-right" src="<?php echo get_template_directory_uri(); ?>/src/images/home-2025/rect-green-pink-vert-2.png" role="presentation" alt="">

</section>
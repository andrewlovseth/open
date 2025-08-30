<?php

    $data_services = get_field('data_services');
    $headline = $data_services['headline'];
    $image = $data_services['image'];

?>

<section class="data-services grid">
    <h3 class="data-services__headline | section-headline-2025"><?php echo $headline; ?></h3>

    <div class="data-services__image">
        <?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
    </div>

    <img class="data-services__rect-right" src="<?php echo get_template_directory_uri(); ?>/src/images/home-2025/rect-blue-blue-vert.png" role="presentation" alt="">

</section>
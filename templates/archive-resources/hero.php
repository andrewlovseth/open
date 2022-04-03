<?php

    $resources = get_field('resources', 'options');
    $hero = $resources['hero_image'];

?>

<section class="hero-compact">
    <?php echo wp_get_attachment_image($hero['ID'], 'full'); ?>
</section>
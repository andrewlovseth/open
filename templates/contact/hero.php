<?php

    $hero = get_field('hero');
    $photo = $hero['image'];

?>

<section class="hero-compact">
    <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
</section>
<?php

    $hero = get_field('hero');
    $photo = $hero['image'];

?>

<section class="hero-compact hero-demo">
    <div class="headline">
        <div class="headline-wrapper">
            <h1 class="page-title"><?php the_title(); ?></h1>
        </div>
    </div>

    <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
</section>
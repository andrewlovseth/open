<?php

    $hero = get_field('hero');
    $background = $hero['background'];
    $logo = $hero['logo'];

 ?>

<section class="hero grid">
    <div class="hero__background">
        <?php echo wp_get_attachment_image($background['ID'], 'full'); ?>
    </div>

    <div class="hero__info">
        <div class="hero__logo">
            <?php get_template_part('src/svg/logo-atlas-orange'); ?>
        </div>
    </div>
</section>
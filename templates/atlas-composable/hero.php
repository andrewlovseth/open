<?php

    $hero = get_field('hero');
    $background = $hero['background'];
    $logo = $hero['logo'];
    $copy = $hero['copy'];

 ?>

<section class="hero grid" style="background-image: url(<?php echo wp_get_attachment_image_url($background['ID'], 'full'); ?>);">

    <div class="hero__info">
        <div class="hero__logo">
            <?php echo print_svg($logo['url']); ?>
        </div>

        <div class="hero__copy | copy copy-2">
            <?php echo $copy; ?>
        </div>
    </div>
</section>
<?php

    $hero = get_field('hero');
    $headline = $hero['headline'];
    $copy = $hero['copy'];

 ?>

<section class="hero grid">
    <div class="hero__wrapper">
        <div class="hero__logo">
            <?php get_template_part('src/svg/logo-atlas-orange'); ?>
        </div>

        <div class="hero__info">
            <h1 class="hero__headline"><?php echo $headline; ?></h1>
            <div class="hero__copy | copy copy-2 extended">
                <?php echo $copy; ?>
            </div>
        </div>
    </div>
</section>
<?php

    $logo = get_field('header_logo', 'option');
    $hero = get_field('hero');

    if (!$hero) return;

    $headline = $hero['headline'] ?? '';
    $tagline = $hero['tagline'] ?? '';
    $diagram = $hero['diagram'] ?? null;
?>

<section class="home-2026-hero | grid">
    <div class="home-2026-hero__content">
        <?php if ($logo) : ?>
            <div class="home-2026-hero__logo">
                <?php echo wp_get_attachment_image($logo['ID'], 'full'); ?>
            </div>
        <?php endif; ?>


        <?php if ($headline) : ?>
            <h1 class="home-2026-hero__headline"><?php echo esc_html($headline); ?></h1>
        <?php endif; ?>

        <?php if ($tagline) : ?>
            <p class="home-2026-hero__tagline"><?php echo esc_html($tagline); ?></p>
        <?php endif; ?>


        <?php if ($diagram) : ?>
            <div class="home-2026-hero__diagram">
                <?php echo wp_get_attachment_image($diagram['ID'], 'full'); ?>
            </div>
        <?php endif; ?>
    </div>


</section>

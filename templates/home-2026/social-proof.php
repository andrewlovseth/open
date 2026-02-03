<?php
    $social = get_field('social_proof');

    if (!$social) return;

    $headline = $social['headline'] ?? '';
    $subheadline = $social['subheadline'] ?? '';
    $logos = $social['logos'] ?? [];
?>

<section class="home-2026-social | grid">
    <div class="home-2026-social__content">
        <?php if ($headline) : ?>
            <h2 class="home-2026-social__headline | section-headline-2025"><?php echo $headline; ?></h2>
        <?php endif; ?>

        <?php if ($subheadline) : ?>
            <p class="home-2026-social__subheadline"><?php echo $subheadline; ?></p>
        <?php endif; ?>

        <?php if ($logos) : ?>
            <div class="home-2026-social__logos">
                <?php foreach ($logos as $logo) : ?>
                    <div class="home-2026-social__logo">
                        <?php echo wp_get_attachment_image($logo['ID'], 'medium'); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

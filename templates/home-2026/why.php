<?php

    $why = get_field('why');

    if (!$why) return;

    $headline = $why['headline'] ?? '';
    $subheadline = $why['subheadline'] ?? '';
    $copy = $why['copy'] ?? '';
?>

<section class="home-2026-why | grid">
    <div class="home-2026-why__content">
        <?php if ($headline) : ?>
            <h2 class="home-2026-why__headline | section-headline-2025"><?php echo esc_html($headline); ?></h2>
        <?php endif; ?>

        <?php if ($subheadline) : ?>
            <p class="home-2026-why__subheadline"><?php echo esc_html($subheadline); ?></p>
        <?php endif; ?>

        <?php if ($copy) : ?>
            <div class="home-2026-why__copy | copy copy-2 secondary-color extended">
                <?php echo $copy; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

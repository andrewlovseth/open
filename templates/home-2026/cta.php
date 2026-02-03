<?php
/**
 * Home 2026 - CTA Section
 * Centered headline with primary button
 */

$cta = get_field('cta');

if (!$cta) return;

$headline = $cta['headline'] ?? '';
$button = $cta['button'] ?? null;
?>

<section class="home-2026-cta">
    <?php if ($headline) : ?>
        <h2 class="home-2026-cta__headline | section-headline-2025"><?php echo esc_html($headline); ?></h2>
    <?php endif; ?>

    <?php if ($button) : ?>
        <div class="cta">
        <a href="<?php echo esc_url($button['url']); ?>"
           class="home-2026-cta__button | btn blue blue-2026"
           <?php echo $button['target'] ? 'target="_blank" rel="noopener"' : ''; ?>>
                <?php echo esc_html($button['title']); ?>
            </a>
        </div>
    <?php endif; ?>
</section>

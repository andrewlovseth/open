<?php

    $differentiators = get_field('differentiators');

    if (!$differentiators) return;

    $headline = $differentiators['headline'] ?? '';
    $items = $differentiators['items'] ?? [];
?>


<section class="home-2026-diff-header grid">
    <?php if ($headline) : ?>
        <h2 class="section-headline-2025"><?php echo esc_html($headline); ?></h2>
    <?php endif; ?>
</section>
<section class="home-2026-diff | grid">
    <?php if ($items) : ?>
        <div class="home-2026-diff__grid">
            <?php foreach ($items as $item) : ?>
                <div class="home-2026-diff__item">
                    <?php if ($item['title']) : ?>
                        <h3 class="home-2026-diff__title"><?php echo esc_html($item['title']); ?></h3>
                    <?php endif; ?>

                    <?php if ($item['description']) : ?>
                        <p class="home-2026-diff__desc"><?php echo $item['description']; ?></p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>

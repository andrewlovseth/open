<?php

    $sticky_footer = get_field('sticky_footer');
    $background_image = $sticky_footer['background_image'];
    $headline = $sticky_footer['headline'];
    $link = $sticky_footer['link'];

?>

<section class="sticky-footer" <?php if($background_image): ?>style="background-image: url('<?php echo $background_image['url']; ?>');"<?php endif; ?>>
    <div class="sticky-footer__content grid">
        <?php if($headline): ?>
            <h2 class="sticky-footer__headline | section-headline-2025"><?php echo $headline; ?></h2>
        <?php endif; ?>

        <?php if($link): ?>
            <div class="sticky-footer__link">
                <a href="<?php echo $link['url']; ?>" class="sticky-footer__button" <?php if($link['target']): ?>target="<?php echo $link['target']; ?>"<?php endif; ?>>
                    <?php echo $link['title']; ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php

    $sticky_footer = get_field('sticky_footer');
    $background_image = $sticky_footer['background_image'];
    $copy = $sticky_footer['copy'];
    $link = $sticky_footer['link'];

?>

<section class="sticky-footer grid">
    <div class="sticky-footer__wrapper">
        <?php if($background_image): ?>
            <div class="sticky-footer__background">
                <?php echo wp_get_attachment_image($background_image['ID'], 'full'); ?>
            </div>
        <?php endif; ?>

        <div class="sticky-footer__content">
            <?php if($copy): ?>
                <h2 class="sticky-footer__headline"><?php echo $copy; ?></h2>
            <?php endif; ?>

            <?php if($link): ?>
                <div class="sticky-footer__link cta">
                    <a href="<?php echo $link['url']; ?>" class="btn blue" <?php if($link['target']): ?>target="<?php echo $link['target']; ?>"<?php endif; ?>>
                        <?php echo $link['title']; ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

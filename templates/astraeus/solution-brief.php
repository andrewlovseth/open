<?php

    $solution_brief = get_field('solution_brief');
    $headline = $solution_brief['headline'];
    $image = $solution_brief['image'];
    $copy = $solution_brief['copy'];
    $link = $solution_brief['link'];
    $background_image = $solution_brief['background_image'];

?>

<section class="solution-brief grid">
    <div class="solution-brief__wrapper">
        <?php if($background_image): ?>
            <div class="solution-brief__background">
                <?php echo wp_get_attachment_image($background_image['ID'], 'full'); ?>
            </div>
        <?php endif; ?>

        <div class="solution-brief__content">
            <?php if($headline): ?>
                <h2 class="solution-brief__headline | section-headline-2025"><?php echo $headline; ?></h2>
            <?php endif; ?>

            <?php if($image): ?>
                <div class="solution-brief__image">
                    <?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
                </div>
            <?php endif; ?>

            <?php if($copy): ?>
                <div class="solution-brief__copy | copy copy-2 secondary-color extended">
                    <?php echo $copy; ?>
                </div>
            <?php endif; ?>

            <?php if($link): ?>
                <div class="solution-brief__link cta">
                    <a href="<?php echo $link['url']; ?>" class="btn blue" <?php if($link['target']): ?>target="<?php echo $link['target']; ?>"<?php endif; ?>>
                        <?php echo $link['title']; ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

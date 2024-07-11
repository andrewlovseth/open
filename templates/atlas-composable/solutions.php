<?php

    $solutions = get_field('solutions');
    $headline = $solutions['headline'];
    $copy = $solutions['copy'];
    $images = $solutions['photos'];
    $form_headline = $solutions['form_headline'];
    $form = $solutions['form'];

?>

<section class="solutions grid">

    <div class="solutions__main">
        <?php if($headline): ?>
            <div class="solutions__headline | headline">
                <h2 class="section-title small"><?php echo $headline; ?></h2>
            </div>
        <?php endif; ?>

        <?php if($copy): ?>
            <div class="solutions__copy | copy copy-2 extended">
                <?php echo $copy; ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="solutions__sidebar">
        <?php if( $images ): ?>
            <div class="solutions__photos">
                <?php foreach( $images as $image ): ?>
                    <div class="solutions__photo">
                        <?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="solutions__form">
            <div class="solutions__form-headline">
                <h4 class="solutions__form-title"><?php echo $form_headline; ?></h4>

                <div class="solutions__form-logo">
                    <?php get_template_part('src/svg/o-logo-outline'); ?>
                </div>
            </div>

            <div class="solutions__form-embed" id="solutions-form">
                <?php echo $form; ?>
            </div>

        </div>
    </div>

</section>


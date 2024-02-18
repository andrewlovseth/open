<?php

    $headline = get_sub_field('headline');
    $sub_headline = get_sub_field('sub_headline');
    $copy = get_sub_field('copy');
    $image = get_sub_field('image');
    $email_form = get_sub_field('email_form');

?>

<section class="newsletter grid">
    <div class="newsletter__info">
        <?php if($headline): ?>
            <h3 class="newsletter__header"><?php echo $headline; ?></h3>
        <?php endif; ?>

        <?php if($sub_headline): ?>
            <h4 class="newsletter__sub_header"><?php echo $sub_headline; ?></h4>
        <?php endif; ?>

        <?php if($copy): ?>
            <div class="newsletter__copy | copy copy-2">
                <?php echo $copy; ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="newsletter__form">
        <?php if($image): ?>
            <div class="newsletter__form-image">
                <?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
            </div>
        <?php endif; ?>

        <?php if($email_form): ?>
            <div class="newsletter__form-embed">
                <?php echo $email_form; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
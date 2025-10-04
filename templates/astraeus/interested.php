<?php

    $interested = get_field('interested');
    $headline = $interested['headline'];
    $copy = $interested['copy'];
    $photo = $interested['photo'];

?>

<section class="interested grid">

    <?php if($photo): ?>
        <div class="interested__image">
            <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
        </div>
    <?php endif; ?>

    <div class="interested__info">
        <h3 class="interested__headline copy-2"><?php echo $headline; ?></h3>

        <div class="interested__copy | copy copy-2 secondary-color extended">
            <?php echo $copy; ?>
        </div>
    </div>

    <div class="interested__blob">
        <img src="<?php echo get_template_directory_uri(); ?>/src/images/home-2025/blob-red.png" role="presentation" alt="">
    </div>


</section>
<?php

    $image = get_sub_field('image');
    $title = get_sub_field('title');
    $copy = get_sub_field('copy');

?>

<section class="page-header grid">
    <div class="image">
        <?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
    </div>

    <h1 class="page-title"><?php echo $title; ?></h1>

    <div class="copy copy-2">
        <?php echo $copy; ?>
    </div>
</section>
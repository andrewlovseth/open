<?php

    $licensing = get_field('licensing');
    $headline = $licensing['headline'];
    $copy = $licensing['copy'];
    $photo = $licensing['photo'];

 ?>

<section class="licensing grid">

    <div class="licensing__info">
        <div class="licensing__headline">
            <h3 class="licensing__title | section-title small"><?php echo $headline; ?></h3>
        </div>

        <div class="licensing__copy | copy copy-2 extended">
            <?php echo $copy; ?>
        </div>
    </div>

    <div class="licensing__photo">
        <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
    </div>
</section>
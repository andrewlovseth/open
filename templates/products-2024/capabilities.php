<?php

    $capabilities = get_field('capabilities');
    $headline = $capabilities['headline'];
    $copy = $capabilities['copy'];
    $photo = $capabilities['photo'];

?>

<section class="capabilities | grid">
    <div class="capabilities__header | section-header">
        <h3 class="capabilities__title | section-title small"><?php echo $headline; ?></h3>
    </div> 
        
    <div class="capabilities__info">
        <div class="capabilities__copy | copy copy-3">
            <?php echo $copy; ?>
        </div>
    </div>

    <div class="capabilities__photo">
        <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
    </div>
</section>
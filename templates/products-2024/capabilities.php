<?php

    $capabilities = get_field('capabilities');
    $headline = $capabilities['headline'];
    $sub_headline = $capabilities['sub_headline'];
    $copy = $capabilities['copy'];
    $other = $capabilities['other_copy'];
    $photo = $capabilities['photo'];

?>

<section class="capabilities | grid">
    <div class="capabilities__header | section-header">
        <h2 class="capabilities__title | section-title small"><?php echo $headline; ?></h2>
    </div> 
        
    <div class="capabilities__info">
        <h3 class="capabilities__sub-title | copy copy-2"><?php echo $sub_headline; ?></h3>

        <div class="capabilities__copy | copy copy-3">
            <?php echo $copy; ?>
        </div>

        <div class="capabilities__other | copy copy-3">
            <?php echo $other; ?>
        </div>
    </div>

    <div class="capabilities__photo">
        <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
    </div>
</section>
<?php

    $workflow = get_field('workflow');
    $headline = $workflow['headline'];
    $copy = $workflow['copy'];
    $graphic = $workflow['graphic'];

?>

<section class="workflow grid">

    <div class="headline">
        <h2 class="section-title"><?php echo $headline; ?></h2>
    </div>

    <div class="copy copy-2 extended secondary-color">
        <?php echo $copy; ?>
    </div>

    <div class="graphic">
        <?php echo wp_get_attachment_image($graphic['ID'], 'full'); ?>
    </div>

</section>
<?php

    $capabilities = get_field('capabilities');
    $headline = $capabilities['headline'];
    $copy = $capabilities['copy'];
    $graphic = $capabilities['graphic'];

?>

<section class="capabilities grid">

    <div class="capabilities__info">
        <?php if($headline): ?>
            <div class="capabilities__headline | headline">
                <h2 class="section-title small"><?php echo $headline; ?></h2>
            </div>
        <?php endif; ?>

        <?php if($copy): ?>
            <div class="capabilities__copy | copy copy-2">
                <?php echo $copy; ?>
            </div>
        <?php endif; ?>
    </div>

    <?php if($graphic): ?>
        <div class="capabilities__graphic">
            <?php echo wp_get_attachment_image($graphic['ID'], 'full'); ?>
        </div>
    <?php endif; ?>

</section>
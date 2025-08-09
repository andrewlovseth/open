<?php

    $workflow = get_field('workflow');
    $copy = $workflow['caption'];
    $graphic = $workflow['graphic'];

?>

<section class="workflow grid">
    
    <div class="graphic">
        <?php echo wp_get_attachment_image($graphic['ID'], 'full'); ?>
    </div>
    
    <div class="copy copy-2 extended secondary-color">
        <?php echo $copy; ?>
    </div>

</section>
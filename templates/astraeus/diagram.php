<?php

    $diagram = get_field('diagram');
    $image = $diagram['image'];

?>

<section class="diagram grid">
    <div class="diagram__image">
        <?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
    </div>
</section>
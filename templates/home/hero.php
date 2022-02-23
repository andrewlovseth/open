<?php

    $hero = get_field('hero');
    $photo = $hero['image'];

?>

<section class="grid hero">
    <div class="photo">
        <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
    </div>
</section>
<?php

    $form = get_field('form');
    $shortcode = $form['shortcode'];

?>

<div class="demo__form opendrives-form">
    <?php echo do_shortcode($shortcode); ?>
</div>
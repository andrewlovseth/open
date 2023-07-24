<?php

    $form = get_field('form');
    $shortcode = $form['shortcode'];

?>

<div class="contact__form opendrives-form">
    <?php echo do_shortcode($shortcode); ?>
</div>
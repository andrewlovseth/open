<?php

    $form = get_field('form');
    $shortcode = $form['shortcode'];

    $alt_form = $form['alt_form'];
    $alt_form_code = $form['alt_form_code'];

?>

<div class="demo__form opendrives-form">
    <?php if($alt_form): ?>
        <?php echo $alt_form_code; ?>
    <?php else: ?>
        <?php echo do_shortcode($shortcode); ?>
    <?php endif; ?>
</div>
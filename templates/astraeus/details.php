<?php

    $details = get_field('details');
    $copy = $details['copy'];

?>

<section class="details grid">
    <div class="details__copy | copy copy-2 secondary-color extended">
        <?php echo $copy; ?>
    </div>

    <img class="details__rect-left" src="<?php echo get_template_directory_uri(); ?>/src/images/home-2025/rect-pink-pink-vert.png" role="presentation" alt="">
</section>
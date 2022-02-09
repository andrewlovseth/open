<?php

    $hero = get_field('hero');
    $photo = $hero['photo'];
    $headline = $hero['headline'];
    $deck = $hero['deck'];

?>

<section class="grid hero">
    <div class="info">
        <div class="headline">
            <h1><?php echo $headline; ?></h1>
        </div>

        <div class="copy copy-1 deck">
            <p><?php echo $deck; ?></p>
        </div>
    </div>

    <div class="photo">
        <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
    </div>
</section>
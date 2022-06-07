<?php


        $hero = get_field('hero');

    $photo = $hero['photo'];
    $headline = $hero['headline'];
?>

<section class="grid hero">
    <div class="info">
        <?php if($headline): ?>
            <div class="headline">
                <h1><?php echo $headline; ?></h1>
            </div>
        <?php endif; ?>
    </div>

    <?php if($photo): ?>
        <div class="photo">
            <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
        </div>
    <?php endif; ?>
</section>
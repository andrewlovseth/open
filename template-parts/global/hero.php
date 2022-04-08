<?php

    $hero_check = get_field('hero');

    if($hero_check['headline'] === null) {
        $hero_array = get_field('hero');
        $hero = $hero_array['hero'];

    } else {
        $hero = get_field('hero');
    }      

    $photo = $hero['photo'];
    $headline = $hero['headline'];
    $deck = $hero['deck'];
?>

<section class="grid hero">
    <div class="info">
        <?php if($headline): ?>
            <div class="headline">
                <h1><?php echo $headline; ?></h1>
            </div>
        <?php endif; ?>

        <?php if($deck): ?>
            <div class="copy copy-1 deck">
                <p><?php echo $deck; ?></p>
            </div>
        <?php endif; ?>
    </div>

    <?php if($photo): ?>
        <div class="photo">
            <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
        </div>
    <?php endif; ?>
</section>

<?php //  get_template_part('templates/solutions/dev-nav'); ?>
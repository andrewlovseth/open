<?php

    $hero_check = get_field('hero');

    if(!isset($hero_check['headline'])) {
        $hero_array = get_field('hero');
        $hero = $hero_array['hero'];

    } else {
        $hero = get_field('hero');
    }      

    $photo = $hero['photo'];
    $headline = $hero['headline'];
    $deck = $hero['deck'];

    if($headline):
?>

<section class="grid hero">
    <div class="info">
        <?php if($headline): ?>
            <div class="headline" data-aos="fade-up" data-aos-duration="2000" data-aos-once="true">
                <h1><?php echo $headline; ?></h1>
            </div>
        <?php endif; ?>

        <?php if($deck): ?>
            <div class="copy copy-1 deck" data-aos="fade-up" data-aos-delay="800" data-aos-duration="1600" data-aos-once="true">
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

<?php endif; ?>
<?php

    $about = get_field('about');
    $headline = $about['headline'];
    $dek = $about['dek'];
    $copy_1 = $about['copy_1'];
    $photo_1 = $about['photo_1'];
    $copy_2 = $about['copy_2'];
    $photo_2 = $about['photo_2'];
?>

<section class="about grid">
    <img class="about__rect-right" src="<?php echo get_template_directory_uri(); ?>/src/images/home-2025/rect-pink-green-vert.png" role="presentation" alt="">
    
    <div class="about__content">
        <h1 class="about__headline | section-headline-2025"><?php echo $headline; ?></h1>
        <div class="about__copy | copy copy-2 secondary-color">
            <?php echo $dek; ?>
        </div>

        <div class="about__editorial about__editorial-1">
            <div class="copy copy-2 secondary-color">
                <?php echo $copy_1; ?>
            </div>
            <div class="photo">
                <?php echo wp_get_attachment_image($photo_1['ID'], 'full'); ?>
            </div>
        </div>

        <div class="about__editorial about__editorial-2">
            <div class="copy copy-2 secondary-color">
                <?php echo $copy_2; ?>
            </div>
            <div class="photo">
                <?php echo wp_get_attachment_image($photo_2['ID'], 'full'); ?>
            </div>
        </div>
    </div>

</section>
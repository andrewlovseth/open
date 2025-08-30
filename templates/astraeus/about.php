<?php

    $about = get_field('about');
    $sub_header = $about['sub_header'];
    $headline = $about['headline'];
    $copy_1 = $about['copy_1'];
    $photo_1 = $about['photo_1'];
    $copy_2 = $about['copy_2'];
    $photo_2 = $about['photo_2'];
?>

<section class="about grid">
    <div class="about__editorial about__editorial-1">
        <div class="about__info">
            <h4 class="about__sub-header"><?php echo $sub_header; ?></h4>
            <h2 class="about__headline | section-headline-2025"><?php echo $headline; ?></h2>

            <div class="about__copy | copy copy-2 secondary-color extended">
                <?php echo $copy_1; ?>
            </div>
        </div>

        <div class="about__image">
            <?php echo wp_get_attachment_image($photo_1['ID'], 'full'); ?>
        </div>
    </div>

    <div class="about__editorial about__editorial-2">
        <div class="about__info">
            <div class="about__copy | copy copy-2 secondary-color extended">
                <?php echo $copy_2; ?>
            </div>
        </div>

        <div class="about__image">
            <?php echo wp_get_attachment_image($photo_2['ID'], 'full'); ?>
        </div>
    </div>
</section>
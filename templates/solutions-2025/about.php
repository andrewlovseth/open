<?php

$about = get_field('about');

if ($about):
    $headline = $about['headline'];
    $sub_headline = $about['sub_headline'];
    $photo_1 = $about['photo_1'];
    $photo_2 = $about['photo_2'];
    $copy_1 = $about['copy_1'];
    $copy_2 = $about['copy_2'];
?>

    <section class="about grid">

        <img class="about__rect-top" src="<?php echo get_template_directory_uri(); ?>/src/images/home-2025/rect-blue-blue-2.png" role="presentation" alt="">

        <img class="about__rect-right" src="<?php echo get_template_directory_uri(); ?>/src/images/home-2025/rect-blue-blue-3.png" role="presentation" alt="">


        <?php if ($headline): ?>
            <h2 class="about__headline section-headline-2025"><?php echo $headline; ?></h2>
        <?php endif; ?>

        <?php if ($sub_headline): ?>
            <h3 class="about__sub-headline sub-headline"><?php echo $sub_headline; ?></h3>
        <?php endif; ?>

        <div class="about__content">
            <div class="about__card">
                <?php if ($photo_1): ?>
                    <div class="about__photo-1">
                        <?php echo wp_get_attachment_image($photo_1['ID'], 'full'); ?>
                    </div>
                <?php endif; ?>

                <?php if ($copy_1): ?>
                    <div class="about__copy-1 | copy copy-3 secondary-color extended">
                        <?php echo $copy_1; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="about__card">
                <?php if ($photo_2): ?>
                    <div class="about__photo-2">
                        <?php echo wp_get_attachment_image($photo_2['ID'], 'full'); ?>
                    </div>
                <?php endif; ?>

                <?php if ($copy_2): ?>
                    <div class="about__copy-2 | copy copy-3 secondary-color extended">
                        <?php echo $copy_2; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

<?php endif; ?>

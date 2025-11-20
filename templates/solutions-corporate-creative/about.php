<?php

    $about_intro = get_field('about_intro');
    $about_middle = get_field('about_middle');
    $about_highlight = get_field('about_highlight');

?>

<section class="about grid">
    <?php if($about_intro): ?>
        <div class="about__intro">
            <?php if($about_intro['headline']): ?>
                <h2 class="about__intro-headline | section-headline-2025"><?php echo $about_intro['headline']; ?></h2>
            <?php endif; ?>

            <?php if($about_intro['copy']): ?>
                <div class="about__intro-copy | copy copy-2 secondary-color extended">
                    <?php echo $about_intro['copy']; ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if($about_middle): ?>
        <div class="about__middle">
            <?php if($about_middle['image']): ?>
                <div class="about__middle-image">
                    <?php echo wp_get_attachment_image($about_middle['image']['ID'], 'full'); ?>
                </div>
            <?php endif; ?>

            <?php if($about_middle['headline']): ?>
                <h3 class="about__middle-headline"><?php echo $about_middle['headline']; ?></h3>
            <?php endif; ?>

            <?php if($about_middle['copy']): ?>
                <div class="about__middle-copy | copy copy-2 secondary-color extended">
                    <?php echo $about_middle['copy']; ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if($about_highlight): ?>
        <div class="about__highlight">
            <?php if($about_highlight['image']): ?>
                <div class="about__highlight-image">
                    <?php echo wp_get_attachment_image($about_highlight['image']['ID'], 'full'); ?>
                </div>
            <?php endif; ?>

            <?php if($about_highlight['headline']): ?>
                <h3 class="about__highlight-headline"><?php echo $about_highlight['headline']; ?></h3>
            <?php endif; ?>

            <?php if($about_highlight['copy_1']): ?>
                <div class="about__highlight-copy-1 | copy copy-2 secondary-color extended">
                    <?php echo $about_highlight['copy_1']; ?>
                </div>
            <?php endif; ?>

            <?php if($about_highlight['copy_2']): ?>
                <div class="about__highlight-copy-2 | copy copy-2 secondary-color extended">
                    <?php echo $about_highlight['copy_2']; ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</section>

<?php

    $about_intro = get_field('about_intro');
    $about_middle = get_field('about_middle');
    $about_highlight = get_field('about_highlight');

?>

<section class="about grid">
    <?php if($about_intro): ?>
        <div class="about__intro">
            <?php if($about_intro['headline']): ?>
                <h3 class="about__intro-headline copy-3"><?php echo $about_intro['headline']; ?></h3>
            <?php endif; ?>

            <?php if($about_intro['copy']): ?>
                <div class="about__intro-copy | copy copy-3 secondary-color extended">
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

            <div class="about__middle-content">
                <?php if($about_middle['headline']): ?>
                    <h3 class="about__middle-headline copy-3"><?php echo $about_middle['headline']; ?></h3>
                <?php endif; ?>

                <?php if($about_middle['copy']): ?>
                    <div class="about__middle-copy | copy copy-3 secondary-color extended">
                        <?php echo $about_middle['copy']; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if($about_highlight): ?>
        <div class="about__highlight">
            <div class="about__highlight-col-1">
                <?php if($about_highlight['image']): ?>
                    <div class="about__highlight-image">
                        <?php echo wp_get_attachment_image($about_highlight['image']['ID'], 'full'); ?>
                    </div>
                <?php endif; ?>

                <?php if($about_highlight['headline']): ?>
                    <h3 class="about__highlight-headline"><?php echo $about_highlight['headline']; ?></h3>
                <?php endif; ?>

                <?php if($about_highlight['copy_1']): ?>
                    <div class="about__highlight-copy-1 | copy copy-3 secondary-color extended">
                        <?php echo $about_highlight['copy_1']; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="about__highlight-col-2">
                <?php if($about_highlight['copy_2']): ?>
                    <div class="about__highlight-copy-2 | copy copy-3 secondary-color extended">
                        <?php echo $about_highlight['copy_2']; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <img class="about__rect-right" src="<?php echo get_template_directory_uri(); ?>/src/images/home-2025/rect-blue-pink-vert.png" role="presentation" alt="">

</section>

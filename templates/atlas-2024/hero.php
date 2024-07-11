<?php

    $hero = get_field('hero');
    $background = $hero['background'];

    $logo = $hero['logo'];
    $headline = $hero['headline'];
    $sub_headline = $hero['sub_headline'];
    $copy = $hero['copy'];
    $sub_copy = $hero['sub_copy'];
    $copy = $hero['copy'];
    $video = $hero['video'];
    $video_thumbnail = $hero['video_thumbnail'];

if(have_rows('hero')): while(have_rows('hero')): the_row(); ?>

<section class="hero grid">
    <div class="hero__background">
        <?php echo wp_get_attachment_image($background['ID'], 'full'); ?>
    </div>

    <div class="hero__info">
        <div class="hero__logo">
            <?php echo print_svg($logo['url']); ?>
        </div>

        <div class="hero__header">
            <h1 class="hero__headline"><?php echo $headline; ?></h1>
            <h2 class="hero__sub-headline copy copy-2"><?php echo $sub_headline; ?></h2>
        </div>

        <div class="hero__copy copy copy-2">
            <?php echo $copy; ?>
        </div>

        <?php if(have_rows('buttons')): ?>

            <div class="hero__buttons">
                <?php while(have_rows('buttons')): the_row(); ?>

                    <?php 
                        $link = get_sub_field('link');
                        if( $link ): 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>

                        <div class="cta">
                            <a class="btn alt" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                        </div>

                    <?php endif; ?>


                <?php endwhile; ?>
            </div>
        
        <?php endif; ?>

        <div class="hero__sub-copy copy copy-2">
            <?php echo $sub_copy; ?>
        </div>

    </div>

    <div class="hero__video">
        <div class="hero__logo-outline">
            <?php get_template_part('src/svg/o-logo-outline'); ?>
        </div>

        <a href="#" class="hero__video-link">
            <?php echo wp_get_attachment_image($video_thumbnail['ID'], 'full'); ?>
        </a>
    </div>

</section>


<?php endwhile; endif; ?>

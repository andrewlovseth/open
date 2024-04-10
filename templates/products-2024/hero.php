<?php
 
    $hero = get_field('hero');
    $photo = $hero['photo'];
    $headline = $hero['headline'];
    $deck = $hero['deck'];
    $link = $hero['link'];

?>

<section class="hero | grid">
    <div class="hero__info">
        <?php if($headline): ?>
            <div class="hero__headline" data-aos="fade-up" data-aos-duration="2000" data-aos-once="true">
                <h1 class="hero__title"><?php echo $headline; ?></h1>
            </div>
        <?php endif; ?>

        <?php if($deck): ?>
            <div class="hero__deck | copy copy-1 " data-aos="fade-up" data-aos-delay="800" data-aos-duration="1600" data-aos-once="true">
                <p><?php echo $deck; ?></p>
            </div>
        <?php endif; ?>

        <?php 
            if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
        ?>

            <div class="hero__cta | cta" data-aos="fade-up" data-aos-delay="1000" data-aos-duration="1200" data-aos-once="true">
                <a class="btn blue" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            </div>

        <?php endif; ?>
    </div>

    <?php if($photo): ?>
        <div class="hero__photo">
            <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
        </div>
    <?php endif; ?>
</section>
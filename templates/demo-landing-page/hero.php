<?php

    $hero = get_field('hero');
    $photo = $hero['photo'];
    $headline = $hero['headline'];
    $copy = $hero['copy'];
    $link = $hero['link'];
    $form = $hero['form'];

?>

<section class="hero grid">
    <div class="hero__wrapper">
        <div class="hero__info">
            <h1 class="hero__title | page-title">
                <?php echo $headline; ?>
            </h1>

            <div class="hero__copy | copy copy-1 extended">
                <?php echo $copy; ?>
            </div>

            <?php 
                if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
            ?>

                <div class="hero__cta | cta">
                    <a class="btn blue" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                </div>

            <?php endif; ?>
        </div>

        <div class="hero__form" id="form">
            <?php echo $form; ?>
        </div>
    </div>


    <div class="hero__photo">
        <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
    </div>
</section>
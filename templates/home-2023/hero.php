<?php 


    $hero = get_field('hero');
    $sub_headline = $hero['sub_headline'];
    $headline = $hero['headline'];
    $photo = $hero['photo'];
    $link = $hero['link'];


?>

    <section class="hero grid">

        <div class="hero__info">
            <div class="hero__info-wrapper">
                <h2 class="hero__sub-headline">
                    <?php echo $sub_headline; ?>
                </h2>

                <?php if(have_rows('hero_phrases')): ?>
                    <div class="hero-swiper">
                        <div class="swiper-wrapper">
                            <?php while(have_rows('hero_phrases')): the_row(); ?>

                                <?php
                                    $phrase = get_sub_field('phrase');
                                ?>

                                <div class="hero__slide swiper-slide">
                                    <h2 class="hero__headline">
                                        <?php echo $headline; ?> <?php echo $phrase; ?> 
                                    </h2>
                                </div>
                            <?php endwhile; ?>
                        </div>

                    </div>

                <?php endif; ?>

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

        </div>

        <div class="hero__photo">
            <div class="hero__photo-wrapper">
<?php
echo wp_get_attachment_image(
  $photo['ID'],
  'hero',        // we'll define this size below
  false,
  [
    'class'          => 'hero__img',
    'loading'        => 'eager',        // critical
    'decoding'       => 'async',
    'fetchpriority'  => 'high',         // Chrome hints this is LCP
    'sizes'          => '(max-width: 768px) 100vw, 1200px' // tune to your layout
  ]
);
?>
            </div>
        </div>

    </section>


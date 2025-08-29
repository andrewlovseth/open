<?php

    $values = get_field('values');
    $headline = $values['headline'];
    $dek = $values['dek'];

?>

<section class="values grid">
    <img class="values__rect-left-top" src="<?php echo get_template_directory_uri(); ?>/src/images/home-2025/rect-green-pink-vert.png" role="presentation" alt="">

    <img class="values__rect-left-bottom" src="<?php echo get_template_directory_uri(); ?>/src/images/home-2025/rect-blue-purple-vert.png" role="presentation" alt="">


    <div class="values__content">
        <h1 class="values__headline | section-headline-2025"><?php echo $headline; ?></h1>
        <div class="values__copy | copy copy-2 secondary-color">
            <?php echo $dek; ?>
        </div>
    </div>

    <div class="values__slides">
        <div class="values-swiper">
            <div class="swiper-wrapper">
                <?php if(have_rows('values_slides')): while(have_rows('values_slides')) : the_row(); ?>

                    <?php if( get_row_layout() == 'slide' ): ?>

                        <?php

                            $headline = get_sub_field('headline');
                            $copy = get_sub_field('copy');
                            $icon = get_sub_field('icon');
                            $color = get_sub_field('color');

                        ?>

                        <div class="swiper-slide slide" style="background-color: <?php echo $color; ?>">
                            <div class="slide__container">
                                <div class="slide__icon">
                                    <?php echo wp_get_attachment_image($icon['ID'], 'full'); ?>
                                </div>
                                <div class="slide__content">
                                    <h3 class="slide__headline"><?php echo $headline; ?></h3>
                                    <div class="slide__copy | copy copy-3">
                                        <?php echo $copy; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endif; ?>

                <?php endwhile; endif; ?>
            </div>

            <div class="swiper-button-prev">
                <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.49067 0L8 1.4145L3.0192 6.002L8 10.5855L6.49067 12L0 6.002L6.49067 0Z" fill="#333333"/>
                </svg>
            </div>
 
            <div class="swiper-button-next">
                <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.50933 12L0 10.5855L4.9808 5.998L0 1.4145L1.50933 0L8 5.998L1.50933 12Z" fill="#333333"/>
                </svg>
            </div>            
        </div>
    </div>

    <div class="values__blob">
        <img src="<?php echo get_template_directory_uri(); ?>/src/images/home-2025/blob-purple-right.jpg" role="presentation" alt="">
    </div>
</section>
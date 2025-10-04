<?php

    $outcomes = get_field('outcomes');
    $headline = $outcomes['headline'];
    $copy_1 = $outcomes['copy_1'];
    $photo_1 = $outcomes['photo_1'];
    $copy_2 = $outcomes['copy_2'];
    $photo_2 = $outcomes['photo_2'];
    $future_headline = get_field('future_headline');

?>

<section class="outcomes grid">
    <h2 class="outcomes__headline | section-headline-2025"><?php echo $headline; ?></h2>

    <div class="outcomes__editorial outcomes__editorial-1">
        <div class="outcomes__info">
            <div class="outcomes__copy | copy copy-2 secondary-color extended">
                <?php echo $copy_1; ?>
            </div>
        </div>

        <div class="outcomes__image">
            <?php echo wp_get_attachment_image($photo_1['ID'], 'full'); ?>
        </div>
    </div>

    <div class="outcomes__editorial outcomes__editorial-2">
        <div class="outcomes__info">
            <div class="outcomes__copy | copy copy-2 secondary-color extended">
                <?php echo $copy_2; ?>
            </div>
        </div>

        <div class="outcomes__image">
            <?php echo wp_get_attachment_image($photo_2['ID'], 'full'); ?>
        </div>
    </div>

    <div class="future-features">
        <h3 class="future-features__header"><?php echo $future_headline; ?></h3>

        <?php if(have_rows('future_features')): ?>
            <div class="future-features__list">
                <?php while(have_rows('future_features')): the_row(); ?>

                    <div class="future-features__item">
                        <h4 class="future-features__headline">
                            <div class="future-features__headline-label">
                                <?php echo get_sub_field('headline'); ?>
                            </div>

                            <div class="icon">
                                <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.7031 1.1563C10.2931 0.763656 9.62879 0.763656 9.2173 1.1563L5.50446 4.70579L1.79163 1.1563C1.38171 0.763656 0.717359 0.763656 0.30744 1.1563C-0.10248 1.54894 -0.10248 2.18345 0.30744 2.5761L4.76315 6.83549C5.17307 7.22499 5.83743 7.22499 6.24735 6.83549L10.7031 2.5761C11.113 2.18345 11.113 1.54894 10.7031 1.1563" fill="#CD1055"/>
                                </svg>
                            </div>
                        </h4>

                        <div class="future-features__copy | copy copy-4 extended">
                            <?php echo get_sub_field('copy'); ?>
                        </div>
                    </div>

                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>

    <img class="outcomes__rect-left" src="<?php echo get_template_directory_uri(); ?>/src/images/home-2025/rect-red-red.png" role="presentation" alt="">
</section>
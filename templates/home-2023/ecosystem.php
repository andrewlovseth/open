<?php

$section_headline = get_field('ecosystem_headline');
$section_dek = get_field('ecosystem_dek');

if(have_rows('ecosystem_features')): ?>

    <section class="ecosystem grid"> 
        <div class="section-header">
            <h2 class="section-title"><?php echo $section_headline; ?></h2>

            <div class="copy copy-2">
                <?php echo $section_dek; ?>
            </div>
        </div>

        <div class="ecosystem__features">
            <?php $i = 1; while(have_rows('ecosystem_features')) : the_row(); ?>

                <?php if( get_row_layout() == 'feature' ): ?>
                    <?php
                        $icon = get_sub_field('icon');
                        $headline = get_sub_field('headline');
                        $copy = get_sub_field('copy');
                        $delay = 400 + (50 * $i);
                    ?>

                    <div class="ecosystem__feature" data-aos="fade-up" data-aos-duration="600" data-aos-delay="<?php echo $delay; ?>">
                        <h3 class="ecosystem__headline">
                            <div class="ecosystem__icon">
                                <?php echo print_svg($icon['url']); ?>
                            </div>

                            <?php echo $headline; ?>
                        </h3>

                        <div class="ecosystem__copy copy copy-3">
                            <?php echo $copy; ?>
                        </div>
                    </div>

                <?php endif; ?>

            <?php $i++; endwhile; ?>
        </div>



    </section>

<?php endif; ?>
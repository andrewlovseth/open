<?php

$section_headline = get_field('ecosystem_headline');
$section_dek = get_field('ecosystem_dek');

if(have_rows('ecosystem_features')): ?>

    <section class="ecosystem grid"> 
        <div class="section-header">
            <h2 class="section-title"><?php echo $section_headline; ?></h2>

            <div class="copy copy-2">
                <?php echo $dek; ?>
            </div>
        </div>

        <?php while(have_rows('ecosystem_features')) : the_row(); ?>

            <?php if( get_row_layout() == 'feature' ): ?>
                <?php
                    $icon = get_sub_field('icon');
                    $headline = get_sub_field('headline');
                    $copy = get_sub_field('copy');
                ?>

                <div class="ecosystem__feature">
                    <h3 class="ecosystem__headline">
                        <?php echo wp_get_attachment_image($icon['ID'], 'full'); ?>
                        <?php echo $headline; ?>
                    </h3>

                    <div class="copy copy-2">
                        <?php echo $copy; ?>
                    </div>
                </div>

            <?php endif; ?>

        <?php endwhile; ?>

    </section>

<?php endif; ?>
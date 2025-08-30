<?php

    $headline = get_field('at_a_glance_headline');

?>

<section class="glance grid">
    <h3 class="glance__headline section-headline-2025"><?php echo $headline; ?></h3>

    <?php if(have_rows('at_a_glance_table')): ?>

         <div class="glance__table" <?php
            $max_rows = 0;
            if(have_rows('at_a_glance_table')):
                while(have_rows('at_a_glance_table')) : the_row();
                    if(get_row_layout() == 'column'):
                        $feature_count = 0;
                        if(have_rows('features')):
                            while(have_rows('features')): the_row();
                                $row_span = get_sub_field('row_span') ?: 1;
                                $feature_count += $row_span;
                            endwhile;
                            $max_rows = max($max_rows, $feature_count);
                        endif;
                    endif;
                endwhile;
            endif;
         ?>style="grid-template-rows: repeat(<?php echo $max_rows + 1; ?>, auto);" data-max-rows="<?php echo $max_rows; ?>">
         <style>
            @media (min-width: 768px) {
                .glance__table {
                    grid-template-rows: repeat(var(--max-rows), auto);
                }
            }
         </style>
         
            <?php while(have_rows('at_a_glance_table')) : the_row(); ?>         
                <?php if( get_row_layout() == 'column' ): ?>

                    <?php
                        $header_color = get_sub_field('header_color');
                        $logo = get_sub_field('logo');
                    ?>

                    <div class="glance__column">
                        <div class="glance__column-header" style="background-color: <?php echo $header_color; ?>;">
                            <?php echo wp_get_attachment_image($logo['ID'], 'full'); ?>
                        </div>
                        
                        <?php if(have_rows('features')): while(have_rows('features')): the_row(); ?>

                            <?php
                                $copy = get_sub_field('copy');
                                $row_span = get_sub_field('row_span');
                            ?>
                        
                            <div class="glance__column-row" <?php if($row_span): ?>style="grid-row: span <?php echo $row_span; ?>;"<?php endif; ?>>
                                <div class="glance__column-copy | copy copy-3 secondary-color extended">
                                    <?php echo $copy; ?>
                                </div>                            
                            </div>

                        <?php endwhile; endif; ?>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>

        </div>
    <?php endif; ?>


    <img class="glance__rect-right" src="<?php echo get_template_directory_uri(); ?>/src/images/home-2025/rect-blue-purple-vert.png" role="presentation" alt="">

</section>
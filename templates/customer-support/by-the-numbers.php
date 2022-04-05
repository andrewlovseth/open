<?php

    $header = get_field('by_the_numbers_header');
    $headline = $header['headline'];
    $copy = $header['copy'];

?>

<section class="by-the-numbers grid">
    <div class="section-header center">
        <div class="headline">
            <h2 class="section-title"><?php echo $headline; ?></h2>
        </div>

        <div class="copy copy-2 secondary-color">
            <?php echo $copy; ?>
        </div>
    </div>

    <div class="fancy-grid">
        <?php
            $sizes = array('large', 'medium', 'small')
        ?>

        <?php if(have_rows('by_the_numbers')): $count = 1; while(have_rows('by_the_numbers')) : the_row(); ?>

            <?php foreach($sizes as $size): ?>
                <?php if( get_row_layout() == $size ): ?>

                    <?php 
                        $graphic = get_sub_field('graphic');
                        $copy = get_sub_field('copy');
                        $background = get_sub_field('background');
                    ?>

                    <div class="number number-<?php echo $size; ?> item item-<?php echo $count; ?>">
                        <div class="content-wrapper">
                            <div class="graphic">
                                <?php echo wp_get_attachment_image($graphic['ID'], 'full'); ?>
                            </div>

                            <div class="copy copy-2 secondary-color">
                                <?php echo $copy; ?>
                            </div>
                        </div>
                
                        <?php if($background): ?>
                            <div class="background">
                                <?php echo wp_get_attachment_image($background['ID'], 'full'); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                <?php endif; ?>
            <?php endforeach; ?>

        <?php $count++; endwhile; endif; ?>
    </div>




</section>
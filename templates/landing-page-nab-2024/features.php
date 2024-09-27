<?php

    $features = get_field('features');
    $headline = $features['headline'];

if(have_rows('features')): while(have_rows('features')): the_row(); ?>

<section class="features grid">
    <div class="section-header">
        <h2 class="section-title x-small"><?php echo $headline; ?></h2>
    </div>

    <div class="columns">
        <?php if(have_rows('columns')): $i = 1; while(have_rows('columns')): the_row(); ?>

            <?php
                $logo = get_sub_field('logo');
                $header = get_sub_field('headline');
                $copy = get_sub_field('copy');
            ?>
 
            <div class="col col-<?php echo $i; ?>">
                <div class="col__logo">
                    <?php echo print_svg($logo['url']); ?>
                </div>

                <div class="col__headline">
                    <h3><?php echo $header; ?></h3>
                </div>

                <div class="col__copy | copy copy-2">
                    <?php echo $copy; ?>
                </div>            
            </div>

        <?php $i++; endwhile; endif; ?>
    </div>

    <div class="call-outs">
        <?php if(have_rows('call_outs')): while(have_rows('call_outs')): the_row(); ?>

            <?php
                $copy = get_sub_field('copy');
            ?>

            <div class="call-outs__copy | copy copy-2">
                <?php echo $copy; ?>
            </div>

        <?php endwhile; endif; ?>
    </div>


</section>


<?php endwhile; endif; ?>
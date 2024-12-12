<?php

    $options_info = get_field('options_info');
    $headline = $options_info['headline'];
    $copy_top = $options_info['copy_top'];
    $copy_bottom = $options_info['copy_bottom'];

 ?>

<section class="options grid">

    <div class="options__headline">
        <h3 class="options__title | section-title small"><?php echo $headline; ?></h3>
    </div>

    <div class="options__copy options__copy-top | copy copy-2 extended">
        <?php echo $copy_top; ?>
    </div>

    <?php if(have_rows('options')): ?>
        <div class="options__grid">
        
            <?php $i = 1; while(have_rows('options')): the_row(); ?>

                <?php
                    $option_logo = get_sub_field('logo');
                    $option_copy = get_sub_field('copy');
                ?>
        
                <div class="option option-<?php echo $i; ?>">
                    <div class="option__logo">
                        <?php echo print_svg($option_logo['url']); ?>
                    </div>

                    <div class="option__copy | copy copy-2">
                        <p><?php echo $option_copy; ?></p>
                    </div>  
                        
                </div>

            <?php $i++; endwhile; ?>
        </div>
    
    <?php endif; ?>

    <div class="options__copy options__copy-bottom | copy copy-2 extended">
        <?php echo $copy_bottom; ?>
    </div>

</section>
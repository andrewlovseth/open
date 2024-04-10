<?php

    $features = get_field('features');
    $header = $features['header'];

if(have_rows('features')): while(have_rows('features')): the_row(); ?>

    <section class="features | grid">
        <div class="features__header | section-header">            
            <div class="features__headline">
                <h2 class="features__title | section-title small"><?php echo $header; ?></h2>
            </div>
        </div>

        <div class="features__list">
            <?php if(have_rows('list')): while(have_rows('list')): the_row(); ?>

                <?php
                    $icon = get_sub_field('icon');
                    $headline = get_sub_field('headline');
                    $deck = get_sub_field('deck');
                ?>
    
                <div class="features__card">
                    <?php if($icon): ?>
                        <div class="features__card-icon">
                                <?php echo print_svg($icon['url']); ?>
                        </div>
                    <?php endif; ?>

                    <div class="features__card-headline">
                        <h3><?php echo $headline; ?></h3>
                    </div>

                    <div class="features__card-deck | copy copy-3">
                        <p><?php echo $deck; ?></p>
                    </div>
                </div>

            <?php endwhile; endif; ?>
        </div>

    </section>

<?php endwhile; endif; ?>
<?php

    $features = get_field('features');
    $headline = $features['headline'];
    $deck = $features['deck'];
    $card_count = count($features['cards']);

if(have_rows('features')): while(have_rows('features')): the_row(); ?>

    <section class="features grid">
        <div class="section-header">            
            <div class="headline">
                <h2 class="section-title"><?php echo $headline; ?></h2>
            </div>

            <div class="copy copy-1 deck">
                <p><?php echo $deck; ?></p>
            </div>
        </div>

        <div class="card-grid cards-<?php echo $card_count; ?>">
            <?php if(have_rows('cards')): $count = 1; while(have_rows('cards')): the_row(); ?>

                <?php
                    $icon = get_sub_field('icon');
                    $card_headline = get_sub_field('headline');
                    $card_deck = get_sub_field('deck');
                ?>
    
                <div class="card card-<?php echo $count; ?>">
                    <div class="info">
                        <div class="icon">
                            <?php echo wp_get_attachment_image($icon['ID'], 'full'); ?>
                        </div>

                        <div class="headline">
                            <h3><?php echo $card_headline; ?></h3>
                        </div>

                        <div class="copy copy-2 deck">
                            <p><?php echo $card_deck; ?></p>
                        </div>
                    </div>
                </div>

            <?php $count++; endwhile; endif; ?>
        </div>

    </section>

<?php endwhile; endif; ?>
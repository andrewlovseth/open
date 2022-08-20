<?php

    $features = get_field('features');
    $headline = $features['headline'];
    $deck = $features['deck'];
    $card_count = count($features['cards']);

if(have_rows('features')): while(have_rows('features')): the_row(); ?>

    <section class="features grid">
        <div class="section-header">            
            <div class="headline" data-aos="fade-up" data-aos-duration="800" data-aos-once="true">
                <h2 class="section-title"><?php echo $headline; ?></h2>
            </div>

            <div class="copy copy-1 deck" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400" data-aos-once="true">
                <p><?php echo $deck; ?></p>
            </div>
        </div>

        <div class="card-grid cards-<?php echo $card_count; ?>">
            <?php if(have_rows('cards')): $count = 1; while(have_rows('cards')): the_row(); ?>

                <?php
                    $icon = get_sub_field('icon');
                    $card_headline = get_sub_field('headline');
                    $card_deck = get_sub_field('deck');
                    $delay = ($count * 400) + 200;
                ?>
    
                <div class="card card-<?php echo $count; ?>" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>" data-aos-duration="600" data-aos-once="true">
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
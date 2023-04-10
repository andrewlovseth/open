<?php

$hero_headline = get_field('hero_headline');

if(have_rows('hero')): ?>

    <section class="hero"> 

        <?php while(have_rows('hero')) : the_row(); ?>

            <?php if( get_row_layout() == 'slide' ): ?>
                <?php
                    $phrase = get_sub_field('phrase');
                    $image = get_sub_field('image');
                ?>

                <div class="hero__slide">
                    <div class="grid">
                        <div class="hero__info">
                            <h1 class="hero__headline">
                                <?php echo $hero_headline; ?>
                                <span class="hero__headline-phrase"><?php echo $phrase; ?></span>
                            </h1>
                        </div>

                        <div class="hero__photo">
                            <?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

        <?php endwhile; ?>

    </section>

<?php endif; ?>
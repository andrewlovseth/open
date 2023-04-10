<?php

$section_headline = get_field('partners_headline');
$section_dek = get_field('partners_dek');
$section_link = get_field('partners_link');

if(have_rows('partners')): ?>

    <section class="partners grid"> 
        <div class="section-header">
            <h2 class="section-title"><?php echo $section_headline; ?></h2>

            <div class="copy copy-2">
                <?php echo $dek; ?>
            </div>
            
            <?php 
                if( $section_link ): 
                $section_link_url = $section_link['url'];
                $section_link_title = $section_link['title'];
                $section_link_target = $section_link['target'] ? $section_link['target'] : '_self';
            ?>

                <div class="cta">
                    <a class="btn btn__blue" href="<?php echo esc_url($section_link_url); ?>" target="<?php echo esc_attr($section_link_target); ?>"><?php echo esc_html($section_link_title); ?></a>
                </div>

            <?php endif; ?>

        </div>

        <?php while(have_rows('partners')) : the_row(); ?>

            <?php if( get_row_layout() == 'partner' ): ?>
                <?php
                    $headline = get_sub_field('headline');
                    $copy = get_sub_field('copy');
                    $photo = get_sub_field('photo');
                    $puzzle_pieces = get_sub_field('puzzle_pieces');
                    $link = get_sub_field('link');

                ?>

                <div class="partners__item">
                    <div class="partners__photo">
                        <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
                    </div>
                    
                    <div class="partners__info">
                        <div class="partners__puzzle-pieces">
                            <?php echo wp_get_attachment_image($puzzle_pieces['ID'], 'full'); ?>
                        </div>

                        <h3 class="partners__headline"><?php echo $headline; ?></h3>

                        <div class="copy copy-2">
                            <?php echo $copy; ?>
                        </div>

                        <?php 
                            if( $link ): 
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>

                            <div class="cta">
                                <a class="btn btn__blue" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                            </div>

                        <?php endif; ?>
                    </div>
                </div>

            <?php endif; ?>

        <?php endwhile; ?>

    </section>

<?php endif; ?>
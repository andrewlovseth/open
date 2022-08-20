<?php

    $ecosystem = get_field('ecosystem');
    $sub_header = $ecosystem['sub_header'];
    $header = $ecosystem['header'];
    $deck = $ecosystem['deck'];

if(have_rows('ecosystem')): while(have_rows('ecosystem')): the_row(); ?>

    <section class="products-ecosystem grid">
        <div class="section-header">
            <div class="sub-header" data-aos="fade-in" data-aos-duration="2000" data-aos-once="true">
                <h3><?php echo $sub_header; ?></h3>
            </div>
            
            <div class="header" data-aos="fade-in" data-aos-delay="400" data-aos-duration="2000" data-aos-once="true">
                <h2><?php echo $header; ?></h2>
            </div>

            <div class="copy copy-1 deck" data-aos="fade-in" data-aos-delay="800" data-aos-duration="2000" data-aos-once="true">
                <p><?php echo $deck; ?></p>
            </div>
        </div>

        <?php if(have_rows('products')): $count = 1; while(have_rows('products')): the_row(); ?>

            <?php
                $icon = get_sub_field('icon');
                $logo = get_sub_field('logo');
                $product_deck = get_sub_field('deck');
                $link = get_sub_field('link');

                if($count % 2 == 0) {
                    $slide = 'fade-right';
                } else {
                    $slide = 'fade-left';
                }

                if($link) {
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                }
            ?>
 
            <div class="product product-<?php echo $count; ?>">
                <div class="info">
                    <div class="icon" data-aos="<?php echo $slide; ?>" data-aos-duration="800" data-aos-delay="400" data-aos-once="true">
                        <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                            <?php echo print_svg($icon['url']); ?>
                        </a>
                    </div>

                    <div class="logo" data-aos="fade" data-aos-duration="800" data-aos-once="true">
                        <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                            <?php echo wp_get_attachment_image($logo['ID'], 'full'); ?>
                        </a>
                    </div>

                    <div class="copy copy-3 deck" data-aos="fade" data-aos-duration="800" data-aos-delay="400" data-aos-once="true">
                        <p><?php echo $product_deck; ?></p>
                    </div>

                    <?php if($link): ?>                    
                        <div class="cta" data-aos="fade" data-aos-duration="800" data-aos-delay="400" data-aos-once="true">
                            <a class="btn blue" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        <?php $count++; endwhile; endif; ?>

    </section>

<?php endwhile; endif; ?>
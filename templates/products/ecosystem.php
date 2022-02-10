<?php

    $ecosystem = get_field('ecosystem');
    $sub_header = $ecosystem['sub_header'];
    $header = $ecosystem['header'];
    $deck = $ecosystem['deck'];

if(have_rows('ecosystem')): while(have_rows('ecosystem')): the_row(); ?>

    <section class="ecosystem grid">
        <div class="section-header">
            <div class="sub-header">
                <h3><?php echo $sub_header; ?></h3>
            </div>
            
            <div class="header">
                <h2><?php echo $header; ?></h2>
            </div>

            <div class="copy copy-1 deck">
                <p><?php echo $deck; ?></p>
            </div>
        </div>

        <?php if(have_rows('products')): $count = 1; while(have_rows('products')): the_row(); ?>

            <?php
                $icon = get_sub_field('icon');
                $logo = get_sub_field('logo');
                $product_deck = get_sub_field('deck');
                $link = get_sub_field('link');
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
 
            <div class="product product-<?php echo $count; ?>">
                <div class="info">
                    <div class="icon">
                        <a class="btn" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                            <?php echo wp_get_attachment_image($icon['ID'], 'full'); ?>
                        </a>
                    </div>

                    <div class="logo">
                        <a class="btn" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                            <?php echo wp_get_attachment_image($logo['ID'], 'full'); ?>
                        </a>
                    </div>

                    <div class="copy copy-3 deck">
                        <p><?php echo $product_deck; ?></p>
                    </div>
                    
                    <div class="cta">
                        <a class="underline blue" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                    </div>
                </div>
            </div>

        <?php $count++; endwhile; endif; ?>

    </section>

<?php endwhile; endif; ?>
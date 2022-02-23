<section class="ecosystem">

    <?php if(have_rows('ecosystem', 'options')): while(have_rows('ecosystem', 'options')): the_row(); ?>
    
        <?php
            $logo = get_sub_field('logo');
            $deck = get_sub_field('deck');
            $link = get_sub_field('link');
            $color = get_sub_field('background_color');
        ?>

        <div class="product" style="background-color: <?php echo $color; ?>">

            <div class="info">
                <div class="logo">
                    <?php echo wp_get_attachment_image($logo['ID'], 'full'); ?>
                </div>

                <div class="deck copy copy-2">
                    <?php echo $deck; ?>
                </div>

                <?php 
                    if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                ?>

                    <div class="cta">
                        <a class="underline blue arrow" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                    </div>

                <?php endif; ?>
            </div>

        </div>

    <?php endwhile; endif; ?>

</section>
<?php

    $intro = get_field('intro');
    $copy = $intro['copy'];
    

    if(have_rows('intro')): while(have_rows('intro')): the_row();

?>

    <section class="intro grid">

        <div class="copy copy-2 extended color-secondary">
            <?php echo $copy; ?>

            <div class="ctas">

                <?php if(have_rows('ctas')): while(have_rows('ctas')): the_row(); ?>

                    <?php
                        $link = get_sub_field('link');
                        if( $link ): 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>

                        <div class="cta">
                            <a class="btn blue" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                        </div>

                    <?php endif; ?>

                <?php endwhile; endif; ?>

            </div>

        </div>
        
    </section>

<?php endwhile; endif; ?>
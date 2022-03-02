<?php if(have_rows('additional_links')): ?>

    <div class="links">

        <?php while(have_rows('additional_links')): the_row(); ?>

            <?php 
                $type = get_sub_field('type');
                $link = get_sub_field('link');
                if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
            ?>

                <div class="link <?php echo $type; ?>">
                    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                        <span class="icon"><?php get_template_part('src/svg/icon-' . $type); ?></span>
                        <span class="label"><?php echo esc_html($link_title); ?></span>                        
                    </a>
                </div>

            <?php endif; ?>

        <?php endwhile; ?>

    </div>

<?php endif; ?>
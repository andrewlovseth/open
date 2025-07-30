<div class="link-list">
    <ul class="navigation">
        <?php if(have_rows('header_nav_links', 'options')): while(have_rows('header_nav_links', 'options')): the_row(); ?>

            <?php 
                $type = get_sub_field('type');
                $link = get_sub_field('link');
                if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_slug = sanitize_title_with_dashes($link_title);
                $link_target = $link['target'] ? $link['target'] : '_self';
            ?>

                <li>
                    <a class="type-<?php echo $type; ?>" data-tab="<?php echo $link_slug; ?>" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                </li>

            <?php endif; ?>

        <?php endwhile; endif; ?>
    </ul>
</div>
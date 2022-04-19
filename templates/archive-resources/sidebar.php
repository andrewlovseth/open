<?php

    $resources = get_field('resources', 'options');
    $types = $resources['types'];
    
    if($types):

?>

    <div class="resources-sidebar">
        <ul class="resources-sidebar-nav" role="navigation">
            <li>
                <?php
                    $all_class = "type-all";
                    if(is_post_type_archive('resources')) {
                        $all_class .= " active";
                    }
                ?>

                <a class="<?php echo $all_class; ?>" href="<?php echo site_url('/resources/'); ?>">
                    <span class="icon"><?php get_template_part('src/svg/icon-all-resources'); ?></span>
                    <span class="label">All Resources</span>
                </a>
            </li>

            <?php foreach($types as $type_obj): ?>
                <?php
                    $type = $type_obj['type'];
                    $type_id = $type->term_id;
                    $name = $type->name;
                    $slug = $type->slug;
                    $type_class = "type-" . $slug;

                    $taxonomy = $type->taxonomy;
                    $term_id = $type->term_id;
                    $icon = get_field('icon', $taxonomy . '_' . $term_id);

                    if(is_tax('resource_type', $slug)) {
                        $type_class .= " active";
                    }
                ?>

                <li>
                    <a class="<?php echo $type_class; ?>" href="<?php echo get_term_link($type_id); ?>">
                        <span class="icon"><?php echo print_svg($icon['url']); ?></span>
                        <span class="label"><?php echo $name; ?></span>
                    </a>
                </li>
            <?php endforeach; ?>

            <?php if(have_rows('resources_links', 'options')): while(have_rows('resources_links', 'options')): the_row(); ?>

                <?php 
                    $link = get_sub_field('link');
                    $link_icon = get_sub_field('icon');
                    if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                ?>

                    <li>
                        <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                            <span class="icon"><?php echo print_svg($link_icon['url']); ?></span>
                            <span class="label"><?php echo esc_html($link_title); ?></span>
                        </a>
                    </li>

                <?php endif; ?>



            <?php endwhile; endif; ?>
        </ul>
    </div>

<?php endif; ?>
<?php if ( have_posts() ): ?>
    
    <?php while ( have_posts() ): the_post(); ?>

        <?php
            $resource_types = get_the_terms($post->ID, 'resource_type');
            $resource_type_slugs = array();
            $resource_type_names = array();
            $resource_type_icons = array();

            foreach($resource_types as $type) {
                $taxonomy = $type->taxonomy;
                $term_id = $type->term_id;
                $name = get_field('singular_label', $taxonomy . '_' . $term_id);
                $icon = get_field('icon', $taxonomy . '_' . $term_id);

                $slug = $type->slug;
                
                array_push($resource_type_slugs, $slug);
                array_push($resource_type_names, $name);
                array_push($resource_type_icons, $icon);
            }

            if(in_array('videos', $resource_type_slugs)):
        ?>

            <?php get_header(); ?>
            
                <?php get_template_part('templates/archive-resources/hero'); ?>

                <section class="resource-detail grid">
                    <?php
                        $args = ['types' => $resource_type_names, 'icons' => $resource_type_icons];
                        get_template_part('templates/archive-resources/resource/video', null, $args);
                    ?>
                </section>

            <?php get_footer(); ?>

        <?php else: ?>

            <?php
                $file = get_field('file');
                if ($file) {
                    header("HTTP/1.1 302 Found");
                    header("Location: " . esc_url($file['url']));
                    exit();
                }
            ?>

        <?php endif; ?>

    <?php endwhile; ?>

<?php endif; ?>
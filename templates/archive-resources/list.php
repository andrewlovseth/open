<div class="resources-list">
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

                <?php
                    $args = ['types' => $resource_type_names, 'icons' => $resource_type_icons];
                    get_template_part('templates/archive-resources/resource/video', null, $args);
                ?>

           <?php else: ?>

                <?php
                    $args = ['types' => $resource_type_names, 'icons' => $resource_type_icons];
                    get_template_part('templates/archive-resources/resource/pdf', null, $args);
                ?>

            <?php endif; ?>

        <?php endwhile; ?>

        <?php if( get_next_posts_link() || get_next_posts_link() ): ?>
            <div class="pagination resources-pagination">
                <?php if( get_previous_posts_link() ): ?>
                    <div class="prev pagination-link">
                        <?php previous_posts_link( 'Previous' ); ?>
                    </div>
                <?php endif; ?>

                <?php if( get_next_posts_link() ): ?>
                    <div class="next pagination-link">
                        <?php next_posts_link( 'Next' ); ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

    <?php else : ?>

        <article>
            <h3>Sorry, no resources matched your criteria.</h3>
        </article>

    <?php endif; ?>    
</div>
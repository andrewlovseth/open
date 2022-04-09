<section class="archive grid">
    <div class="three-col-grid">

        <?php
            $blog = get_field('blog', 'options');
            $featured_blog_items = $blog['featured'];
            $exclude_array = [];

            foreach($featured_blog_items as $featured_blog_item) {
                array_push($exclude_array, $featured_blog_item->ID);
            }           

            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 100,
                'post__not_in' => $exclude_array
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
            
                <?php
                    $args = ['blog' => $post];
                    get_template_part('templates/archive-post/posts/post', null, $args);
                ?>

        <?php endwhile; endif; wp_reset_postdata(); ?>

    </div>
</section>
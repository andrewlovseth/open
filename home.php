<?php get_header(); ?>


<section class="blog-header grid">
    <h1 class="page-title">OpenMinds</h1>

    <div class="tag">
        <p>Insights from</p>
        <div class="logo">
            <?php $logo = get_field('footer_logo', 'options'); echo print_svg($logo['url']); ?>
        </div>
    </div>
</section>

    <?php
        $blog = get_field('blog', 'options');
        $featured_blog_items = $blog['featured'];
        if( $featured_blog_items ):
    ?>

        <section class="featured grid">
            <div class="featured-container">
                <?php foreach( $featured_blog_items as $blog_item ): ?>

                    <?php
                        $args = ['blog' => $blog_item];
                        get_template_part('templates/archive-blog/featured-post', null, $args);
                    ?>

                <?php endforeach; ?>
            </div>
        </section>

    <?php endif; ?>


    <section class="archive grid">
        <div class="three-col-grid">

            <?php
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
                        get_template_part('templates/archive-blog/post', null, $args);
                    ?>

            <?php endwhile; endif; wp_reset_postdata(); ?>

        </div>
    </section>

<?php get_footer(); ?>
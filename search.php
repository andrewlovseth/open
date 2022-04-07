
<?php get_header(); ?>

    <?php get_template_part('template-parts/global/search-results/hero'); ?>

    <?php get_template_part('template-parts/global/search-results/page-header'); ?>

    <section class="search-results grid">
        <?php if ( have_posts() ): ?>
            <?php while ( have_posts() ): the_post(); ?>

                <?php
                    $post_type = get_post_type( $post->ID );
                    $args = ['item' => $post];
                    get_template_part('template-parts/global/search-results/' . $post_type, null, $args);
                ?>
            
            <?php endwhile; ?>

            <?php $results_count = $wp_query->found_posts; if($results_count > 10): ?>
                <div class="pagination">
                    <?php

                        global $wp_query;
                            
                        $big = 999999999; // need an unlikely integer
                            
                        echo paginate_links( array(
                            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                            'format' => '?paged=%#%',
                            'current' => max( 1, get_query_var('paged') ),
                            'total' => $wp_query->max_num_pages
                        ) );
                    ?>
                </div>
            <?php endif; ?>

        <?php else: ?>

            <?php get_template_part('template-parts/global/search-results/no-results'); ?>
            
        <?php endif; ?>
    </section>


<?php get_footer(); ?>
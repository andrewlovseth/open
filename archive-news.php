<?php 

    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $news = get_field('news', 'options');
    $featured_news_items = $news['featured'];

get_header(); ?>

    <section class="page-header grid">
        <h1 class="page-title dark-blue">Press Room</h1>
    </section>

    <?php if($paged == 1): ?>
        <?php get_template_part('templates/archive-news/featured'); ?>
    <?php endif; ?>

    <section class="archive grid">
        <div class="three-col-grid">

            <?php
                $exclude_array = [];

                foreach($featured_news_items as $featured_news_item) {
                    array_push($exclude_array, $featured_news_item->ID);
                }
                
                $args = array(
                    'post_type' => 'news',
                    'posts_per_page' => 12,
                    'post__not_in' => $exclude_array,
                    'paged' => $paged
                );
                $query = new WP_Query( $args );
                if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
                
                <?php
                    $news_types = get_the_terms( $post->ID, 'news_types');
                    $news_type_slug = $news_types[0]->slug;

                    $args = ['news' => $post];
                    get_template_part('templates/archive-news/' . $news_type_slug, null, $args);
                ?>

            <?php endwhile; ?>

            <div class="pagination">
                <?php
                    $big = 999999999;
                        
                    echo paginate_links( array(
                        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                        'format' => '?paged=%#%',
                        'current' => max( 1, get_query_var('paged') ),
                        'total' => $query->max_num_pages
                    ) );
                ?>
            </div>


        
        <?php endif; wp_reset_postdata(); ?>

        </div>
    </section>


<?php get_footer(); ?>
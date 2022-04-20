<?php get_header(); ?>
	<?php get_template_part('templates/company/nav'); ?>

    <section class="page-header grid">
        <h1 class="page-title dark-blue">Newsroom</h1>
    </section>

    <?php
        $news = get_field('news', 'options');
        $featured_news_items = $news['featured'];
        if( $featured_news_items ):
    ?>

        <section class="featured grid">
            <div class="featured-container">
                <?php foreach( $featured_news_items as $news_item ): ?>

                    <?php
                        $news_types = get_the_terms( $news_item->ID, 'news_types');
                        $news_type_slug = $news_types[0]->slug;

                        $args = ['news' => $news_item];
                        get_template_part('templates/archive-news/' . $news_type_slug, null, $args);
                    ?>


                <?php endforeach; ?>
            </div>
        </section>

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
                    'posts_per_page' => 100,
                    'post__not_in' => $exclude_array
                );
                $query = new WP_Query( $args );
                if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
                
                <?php
                    $news_types = get_the_terms( $post->ID, 'news_types');
                    $news_type_slug = $news_types[0]->slug;

                    $args = ['news' => $post];
                    get_template_part('templates/archive-news/' . $news_type_slug, null, $args);
                ?>

            <?php endwhile; endif; wp_reset_postdata(); ?>

        </div>
    </section>


<?php get_footer(); ?>
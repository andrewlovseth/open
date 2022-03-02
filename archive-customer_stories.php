<?php get_header(); ?>

    <section class="page-header grid">
        <h1 class="page-title">Customer Stories</h1>
    </section>


    <?php
        $customer_stories = get_field('customer_stories', 'options');
        $featured_posts = $customer_stories['featured'];
        if( $featured_posts ):
    ?>

        <section class="featured grid">
            <?php foreach( $featured_posts as $p ): ?>
                <article>
                    <a href="<?php echo get_permalink( $p->ID ); ?>">
                        <div class="photo">
                            <?php echo get_the_post_thumbnail($p->ID ); ?>
                        </div>

                        <div class="info">
                            <h3><?php echo get_the_title( $p->ID ); ?></h3>
                        </div>
                    </a>
                </article>
            <?php endforeach; ?>
        </section>

    <?php endif; ?>


    <section class="archive grid">
        <div class="three-col-grid">

            <?php
                $exclude_array = [];

                foreach($featured_posts as $featured_post) {
                    array_push($exclude_array, $featured_post->ID);
                }           

                $args = array(
                    'post_type' => 'customer_stories',
                    'posts_per_page' => 100,
                    'post__not_in' => $exclude_array
                );
                $query = new WP_Query( $args );
                if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

                <?php
                    $search = get_field('search', $item->ID);

                    if($search['title']) {
                        $title = $search['title'];
                    } else {
                        $title = get_the_title( $item->ID );
                    }     
                ?>

                <article class="customer-story">
                    <a href="<?php the_permalink(); ?>">
                        <div class="photo">
                            <?php echo the_post_thumbnail('medium'); ?>
                        </div>

                        <div class="info">
                            <h3><?php echo $title; ?></h3>
                        </div>        
                    </a>
                </article>

            <?php endwhile; endif; wp_reset_postdata(); ?>

        </div>
    </section>


<?php get_footer(); ?>
<section class="archive grid">
    <div class="three-col-grid">

        <?php
            $customer_stories = get_field('customer_stories', 'options');
            $featured_posts = $customer_stories['featured'];
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
                $search = get_field('search');

                if($search['title']) {
                    $title = $search['title'];
                } else {
                    $title = get_the_title();
                }

                $description = $search['description'];
            ?>

            <article class="customer-story">
                <a href="<?php the_permalink(); ?>">
                    <div class="photo">
                        <?php echo the_post_thumbnail('medium'); ?>
                    </div>

                    <div class="info">
                        <h3><?php echo $title; ?></h3>

                        <?php if($description): ?>
                            <div class="description copy copy-3">
                                <p><?php echo $description; ?></p>
                            </div>
                        <?php endif; ?>

                    </div>        
                </a>
            </article>

        <?php endwhile; endif; wp_reset_postdata(); ?>

    </div>
</section>
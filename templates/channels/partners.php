<?php
    $partners = get_field('partners');
    $headline = $partners['headline'];
    $copy = $partners['copy'];
?>

<section class="partners grid">
    <div class="section-header center">
        <div class="headline">
            <h3 class="module-title"><?php echo $headline; ?></h3>
        </div>

        <div class="copy copy-2">
            <?php echo $copy; ?>
        </div>        
    </div>

    <div class="partners-grid customer-grid">


        <?php
        $args = array(
            'post_type' => 'partners',
            'posts_per_page' => 200,
            'order' => 'ASC',
            'orderby' => 'title',
            'tax_query' => array(
                array(
                    'taxonomy' => 'partner_type',
                    'field'    => 'slug',
                    'terms'    => 'channel-partners',
                ),
            ),
            

        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>


        <div class="partner logo">
            <div class="image">
                <?php the_post_thumbnail(); ?>
            </div>
        </div>

        <?php endwhile; endif; wp_reset_postdata(); ?>
    </div>
</section>
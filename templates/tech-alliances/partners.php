<?php
    $partners = get_field('partners');
    $headline = $partners['headline'];
    $copy = $partners['copy'];
    $filter_header = $partners['filter_header'];

    if(have_rows('partners')): while(have_rows('partners')): the_row();

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

    <div class="filters">
        <div class="header">
            <h5><?php echo $filter_header; ?></h5>
        </div>

        <div class="button-group">
            <a href="#" class="active js-partner-filter-link" data-filter="all">All</a>
            <?php if(have_rows('filters')): while(have_rows('filters')): the_row(); ?>
                <a href="#" class="js-partner-filter-link" data-filter="<?php the_sub_field('slug'); ?>"><?php the_sub_field('label'); ?></a>
            <?php endwhile; endif; ?>
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
                        'terms'    => 'tech-alliance-partners',
                    ),
                ),
                

            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

            <?php
                $categories = get_field('category');

                $partner_class = "partner logo";
                foreach($categories as $category) {
                    $partner_class .= " " . $category;
                }

            ?>


            <div class="<?php echo $partner_class; ?>">
                <div class="image">
                    <?php the_post_thumbnail(); ?>
                </div>
            </div>

            <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
    </section>

<?php endwhile; endif; ?>
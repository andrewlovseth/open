<?php get_header(); ?>

    <div class="spacer"></div>

    <?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>

        <article <?php post_class('grid'); ?>>
            <section class="article-header">
                <div class="back">
                    <a href="<?php echo site_url('/customer-stories/'); ?>">Customer Stories</a>
                </div>
                <h1><?php the_title(); ?></h1>
            </section>

            <section class="article-body">
                <?php get_template_part('templates/single-customer-stories/featured-media'); ?>

                <div class="copy copy-2 extended">
                    <?php if(get_field('title')): ?>
                        <div class="title">
                            <h2><?php echo get_field('title'); ?></h2>
                        </div>
                    <?php endif; ?>
                    
                    <?php get_template_part('template-parts/global/share-links'); ?>

                    <?php echo get_field('body'); ?>

                    <?php get_template_part('templates/single-customer-stories/documents'); ?>
                    
                    <?php get_template_part('templates/single-customer-stories/links'); ?>
                </div>
            </section>

            <aside class="article-sidebar">
                <?php if(get_field('sidebar')): ?>
                    <div class="copy copy-3 extended">
                        <?php echo get_field('sidebar'); ?>
                    </div>
                <?php endif; ?>
                
                <?php get_template_part('templates/single-customer-stories/products'); ?>

                <?php get_template_part('templates/single-customer-stories/solutions'); ?>

            </aside>

            <section class="article-footer">
                <?php get_template_part('templates/single-customer-stories/call-to-action'); ?>

                <?php get_template_part('template-parts/global/related'); ?>
            </section>
        </article>

    <?php endwhile; endif; ?>

<?php get_footer(); ?>
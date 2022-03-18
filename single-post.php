<?php get_header(); ?>

    <?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>

        <article <?php post_class('grid'); ?>>
            <section class="article-header">
                <div class="back">
                    <a href="<?php echo site_url('/blog/'); ?>">Blog</a>
                </div>

                <h1><?php the_title(); ?></h1>
            </section>

            <section class="article-body">                
                <?php if(get_the_post_thumbnail()): ?>
                    <div class="featured-image">
                        <?php the_post_thumbnail(); ?>
                    </div>
                <?php endif; ?>
                
                <?php get_template_part('template-parts/global/share-links'); ?>

                <div class="copy copy-2 extended">
                    <?php the_content(); ?>
                </div>
                
                
            </section>

            <section class="article-footer">
                <?php get_template_part('template-parts/global/related'); ?>
            </section>
        </article>

    <?php endwhile; endif; ?>

<?php get_footer(); ?>
<?php get_header(); ?>

    <?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>

        <?php get_template_part('template-parts/global/page-title'); ?>

        <section class="page-body default grid">
            <div class="copy copy-2 extended">
                <?php the_content(); ?>
            </div>        
        </section>

    <?php endwhile; endif; ?>

<?php get_footer(); ?>
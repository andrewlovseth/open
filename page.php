<?php get_header(); ?>

    <?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>

        <div class="page-content | grid">
            <div class="page-header">
                <h1 class="page-title"><?php the_title(); ?></h1>
            </div>

            <div class="page-body | copy copy-3 extended">
                <?php the_content(); ?>
            </div>
        </div>

    <?php endwhile; endif; ?>

<?php get_footer(); ?>


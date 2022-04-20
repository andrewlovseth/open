<?php get_header(); ?>
	<?php get_template_part('templates/company/nav'); ?>

    <?php get_template_part('templates/single-post/back'); ?>

    <?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>

        <article <?php post_class('grid'); ?>>
            <?php get_template_part('templates/single-post/header'); ?>

            <?php get_template_part('templates/single-post/body'); ?>

            <?php get_template_part('templates/single-post/footer'); ?>
        </article>

    <?php endwhile; endif; ?>

<?php get_footer(); ?>
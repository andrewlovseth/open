<?php

/*
	Template Name: Leadership
*/

get_header(); ?>

    <section class="page-header grid">
        <h1 class="page-title"><?php echo get_field("hero_headline"); ?></h1>
    </section>

	<?php get_template_part('templates/leadership/grid'); ?>
		
<?php get_footer(); ?>
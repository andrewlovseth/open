<?php

/*
	Template Name: Demo
*/

get_header(); ?>

    <?php get_template_part('templates/demo/hero'); ?>

    <section class="demo">
        <?php get_template_part('templates/demo/content'); ?>

        <?php get_template_part('templates/demo/form'); ?>
    </section>
    
<?php get_footer(); ?>
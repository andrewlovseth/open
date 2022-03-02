<?php

global $has_hero;
$has_hero = 'has-hero';


/*
	Template Name: Atlas
*/

get_header(); ?>

	<?php get_template_part('template-parts/global/hero'); ?>

    <?php get_template_part('templates/atlas/overview'); ?>

    <?php get_template_part('templates/atlas/features'); ?>

    <?php get_template_part('templates/atlas/containerization'); ?>

	<?php get_template_part('template-parts/global/ecosystem'); ?>

<?php get_footer(); ?>
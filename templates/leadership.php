<?php

global $has_hero;
$has_hero = 'has-hero';

/*
	Template Name: Leadership
*/

get_header(); ?>

	<?php get_template_part('template-parts/global/hero'); ?>

	<?php get_template_part('templates/leadership/grid'); ?>
		
<?php get_footer(); ?>
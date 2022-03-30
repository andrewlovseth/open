<?php

global $has_hero;
$has_hero = 'has-hero';


/*
	Template Name: Solutions Media
*/

get_header(); ?>

	<?php get_template_part('template-parts/global/hero'); ?>

	<?php get_template_part('templates/solutions/intro'); ?>

	<?php get_template_part('templates/solutions/media/uses'); ?>

	<?php get_template_part('template-parts/global/related'); ?>
		
<?php get_footer(); ?>
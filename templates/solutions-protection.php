<?php

global $has_hero;
$has_hero = 'has-hero';


/*
	Template Name: Solutions Protection
*/

get_header(); ?>

	<?php get_template_part('template-parts/global/hero'); ?>

	<?php get_template_part('templates/solutions/intro'); ?>

	<?php get_template_part('templates/solutions/protection/data-protection'); ?>

	<?php get_template_part('templates/solutions/protection/features'); ?>

	<?php get_template_part('templates/solutions/protection/partners'); ?>

	<?php get_template_part('template-parts/global/related'); ?>
		
<?php get_footer(); ?>
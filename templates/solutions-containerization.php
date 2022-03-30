<?php

global $has_hero;
$has_hero = 'has-hero';


/*
	Template Name: Solutions Containerization
*/

get_header(); ?>

	<?php get_template_part('template-parts/global/hero'); ?>

	<?php get_template_part('templates/solutions/intro'); ?>

	<?php get_template_part('templates/solutions/containerization/features'); ?>

	<?php get_template_part('templates/solutions/containerization/pods-recipes'); ?>

	<?php get_template_part('template-parts/global/related'); ?>
		
<?php get_footer(); ?>
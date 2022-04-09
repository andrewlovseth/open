<?php

global $has_hero;
$has_hero = 'has-hero';

/*
	Template Name: Home
*/

get_header(); ?>

	<?php get_template_part('templates/home/hero'); ?>

	<?php get_template_part('templates/home/intro'); ?>

	<?php get_template_part('templates/home/open'); ?>
	
	<?php get_template_part('templates/home/customers'); ?>

<?php get_footer(); ?>
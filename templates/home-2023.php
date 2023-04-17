<?php

global $has_hero;
$has_hero = 'has-hero';

/*
	Template Name: Home 2023
*/

get_header(); ?>


	<?php get_template_part('templates/home-2023/hero'); ?>
	
	<?php get_template_part('templates/home-2023/customers'); ?>

	<?php get_template_part('templates/home-2023/about'); ?>

	<?php get_template_part('templates/home-2023/atlas'); ?>

	<?php get_template_part('templates/home-2023/ecosystem'); ?>

	<?php get_template_part('templates/home-2023/partners'); ?>

<?php get_footer(); ?>
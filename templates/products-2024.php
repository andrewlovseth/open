<?php

global $has_hero;
$has_hero = 'has-hero';


/*
	Template Name: Products (2024)
*/

get_header(); ?>

	
	<?php get_template_part('templates/products-2024/hero'); ?>
	
	<?php get_template_part('templates/products-2024/overview'); ?>

	<?php get_template_part('templates/products-2024/features'); ?>
	
	<?php get_template_part('templates/home-2023/partners'); ?>

	<?php get_template_part('templates/products-2024/capabilities'); ?>

	<?php get_template_part('templates/products-2024/open-standards'); ?>

	<?php get_template_part('templates/products-2024/cta'); ?>

<?php get_footer(); ?>
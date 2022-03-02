<?php

global $has_hero;
$has_hero = 'has-hero';


/*
	Template Name: Products
*/

get_header(); ?>

	<?php get_template_part('template-parts/global/hero'); ?>
	
	<?php get_template_part('templates/products/overview'); ?>
	
	<?php get_template_part('templates/products/ecosystem'); ?>
	
	<?php get_template_part('templates/products/features'); ?>

    
<?php get_footer(); ?>
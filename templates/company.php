<?php

global $has_hero;
$has_hero = 'has-hero';

/*
	Template Name: Company
*/

get_header(); ?>

	<?php get_template_part('template-parts/global/hero'); ?>
	
	<?php get_template_part('templates/company/intro'); ?>

	<?php get_template_part('templates/company/features'); ?>
	
	<?php get_template_part('templates/company/customers'); ?>

<?php get_footer(); ?>
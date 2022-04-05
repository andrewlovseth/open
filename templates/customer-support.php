<?php

global $has_hero;
$has_hero = 'has-hero';

/*
	Template Name: Customer Support
*/

get_header(); ?>

	<?php get_template_part('template-parts/global/hero'); ?>

	<?php get_template_part('templates/customer-support/intro'); ?>

	<?php get_template_part('templates/customer-support/features'); ?>

	<?php get_template_part('templates/customer-support/by-the-numbers'); ?>
    
<?php get_footer(); ?>
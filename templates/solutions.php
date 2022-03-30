<?php

global $has_hero;
$has_hero = 'has-hero';


/*
	Template Name: Solutions 
*/

get_header(); ?>

	<?php get_template_part('template-parts/global/hero'); ?>
	
	<?php get_template_part('templates/solutions-index/solutions-list'); ?>

<?php get_footer(); ?>
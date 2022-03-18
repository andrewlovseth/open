<?php

global $has_hero;
$has_hero = 'has-hero';


/*
	Template Name: Solutions
*/

get_header(); ?>

	<?php get_template_part('template-parts/global/hero'); ?>
	
	<?php get_template_part('templates/single-customer-stories/solutions'); ?>

<?php get_footer(); ?>
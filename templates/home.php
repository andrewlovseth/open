<?php

global $has_hero;
$has_hero = 'has-hero';

/*
	Template Name: Home
*/

get_header(); ?>

	<?php get_template_part('templates/home/hero'); ?>

    
<?php get_footer(); ?>
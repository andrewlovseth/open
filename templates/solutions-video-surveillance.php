<?php

global $has_hero;
$has_hero = 'has-hero';


/*
	Template Name: Solutions Video Surveillance
*/

get_header(); ?>

	<?php get_template_part('template-parts/global/hero'); ?>

	<?php get_template_part('templates/solutions/intro'); ?>

	<?php get_template_part('templates/solutions/video-surveillance/did-you-know'); ?>

	<?php get_template_part('templates/solutions/video-surveillance/features'); ?>

	<?php get_template_part('templates/solutions/video-surveillance/simplifies'); ?>

	<?php get_template_part('templates/solutions/video-surveillance/difference'); ?>

	<?php get_template_part('template-parts/global/related'); ?>
	
<?php get_footer(); ?>
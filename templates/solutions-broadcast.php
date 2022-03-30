<?php

global $has_hero;
$has_hero = 'has-hero';


/*
	Template Name: Solutions Broadcast
*/

get_header(); ?>

	<?php get_template_part('template-parts/global/hero'); ?>

	<?php get_template_part('templates/solutions/intro'); ?>

	<?php get_template_part('templates/solutions/broadcast/workflow'); ?>

	<?php get_template_part('templates/solutions/broadcast/features'); ?>

	<?php get_template_part('templates/solutions/broadcast/partners'); ?>

	<?php get_template_part('template-parts/global/related'); ?>
		
<?php get_footer(); ?>
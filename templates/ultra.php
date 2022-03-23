<?php

global $has_hero;
$has_hero = 'has-hero';

/*
	Template Name: Ultra
*/

get_header(); ?>

	<?php get_template_part('template-parts/global/hero'); ?>

    <?php get_template_part('templates/atlas/overview'); ?>

    <?php get_template_part('templates/atlas/features'); ?>

    <?php get_template_part('templates/ultra/series'); ?>

	<?php get_template_part('templates/ultra/consumption-models'); ?>

	<?php get_template_part('template-parts/global/ecosystem'); ?>

<?php get_footer(); ?>
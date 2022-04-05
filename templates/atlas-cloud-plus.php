<?php

global $has_hero;
$has_hero = 'has-hero';

/*
	Template Name: Atlas Cloud Plus
*/

get_header(); ?>

	<?php get_template_part('template-parts/global/hero'); ?>

    <?php get_template_part('templates/atlas-cloud-plus/overview'); ?>

	<?php get_template_part('templates/atlas-cloud-plus/services'); ?>

    <?php get_template_part('templates/atlas-cloud-plus/features'); ?>

	<?php get_template_part('template-parts/global/ecosystem'); ?>

<?php get_footer(); ?>
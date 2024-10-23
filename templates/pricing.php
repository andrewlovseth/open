<?php

global $has_hero;
$has_hero = 'has-hero';

/*
	Template Name: Pricing
*/

get_header(); ?>

    <?php get_template_part('templates/pricing/hero'); ?>

    <?php get_template_part('templates/pricing/overview'); ?>

    <?php get_template_part('templates/pricing/features'); ?>

    <?php get_template_part('templates/pricing/cta'); ?>

<?php get_footer(); ?>
<?php

global $has_hero;
$has_hero = 'has-hero';

/*
	Template Name: Atlas 2024
*/

get_header(); ?>


    <?php get_template_part('templates/atlas-2024/hero'); ?>

    <?php get_template_part('templates/atlas-2024/clients'); ?>

    <?php get_template_part('templates/atlas-2024/capabilities'); ?>

    <?php get_template_part('templates/atlas-2024/solutions'); ?>

    <?php get_template_part('templates/atlas-2024/cta'); ?>

<?php get_footer(); ?>
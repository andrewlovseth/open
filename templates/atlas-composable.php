<?php

global $has_hero;
$has_hero = 'has-hero';

/*
	Template Name: Atlas Composable
*/

get_header(); ?>


    <?php get_template_part('templates/atlas-composable/hero'); ?>
    
    <?php get_template_part('templates/atlas-composable/solutions'); ?>

    <?php get_template_part('templates/atlas-composable/cta'); ?>

<?php get_footer(); ?>
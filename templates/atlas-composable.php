<?php

global $has_hero;
$has_hero = 'has-hero';

/*
	Template Name: Atlas Composable
*/

get_header(); ?>


    <?php get_template_part('templates/atlas-composable/hero'); ?>
    
    <?php get_template_part('templates/atlas-composable/licensing'); ?>

    <?php get_template_part('templates/atlas-composable/performance-engine'); ?>

    <?php get_template_part('templates/atlas-composable/options'); ?>

    <?php get_template_part('templates/atlas-composable/cta'); ?>
    
    <section class="composable-related grid">
    <?php get_template_part('template-parts/global/related'); ?>
    </section>


<?php get_footer(); ?>
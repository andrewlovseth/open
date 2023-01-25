<?php

/*
	Template Name: Landing Page
*/

get_header(); ?>


    <?php if(have_rows('modules')): while(have_rows('modules')) : the_row(); ?>

        <?php if( get_row_layout() == 'page_header' ): ?>

            <?php get_template_part('templates/landing-page/page-header'); ?>

        <?php endif; ?>

        <?php if( get_row_layout() == 'active_campaign_form' ): ?>

            <?php get_template_part('templates/landing-page/active-campaign-form'); ?>

        <?php endif; ?>

    <?php endwhile; endif; ?>
   
<?php get_footer(); ?>


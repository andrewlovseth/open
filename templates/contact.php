<?php

/*
	Template Name: Contact
*/

get_header(); ?>

	<?php get_template_part('templates/contact/hero'); ?>
	
	<?php get_template_part('templates/company/nav'); ?>

	<div class="contact-container">
		<?php get_template_part('templates/contact/contact-info'); ?>

		<?php get_template_part('templates/contact/form'); ?>
	</div>

<?php get_footer(); ?>
<?php

/*
	Template Name: Contact
*/

get_header(); ?>

	<?php get_template_part('templates/contact/hero'); ?>
	
	<div class="contact-container">
		<?php get_template_part('templates/contact/contact-info'); ?>

		<?php get_template_part('templates/contact/form'); ?>
	</div>

<?php get_footer(); ?>
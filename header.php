<?php
	global $has_hero;
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>
	
	<?php wp_head(); ?>
</head>

<body <?php body_class($has_hero); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
	
	<header class="site-header">
		<?php get_template_part('template-parts/header/logo'); ?>

		<?php get_template_part('template-parts/header/desktop-navigation'); ?>

		<?php get_template_part('template-parts/header/search'); ?>

		<?php get_template_part('template-parts/header/cta'); ?>

		<?php get_template_part('template-parts/header/hamburger'); ?>
	</header>

	<?php get_template_part('template-parts/header/navigation'); ?>

	<main class="site-content">
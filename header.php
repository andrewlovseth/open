<?php
	global $has_hero;
	$nab_banner = get_field('nab_banner_show', 'options');
	
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	
	<?php wp_head(); ?>

	<?php 
		// Atlas Cloud Plus
		if(is_page(array(26, 'home-2023'))): ?>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
	<?php endif; ?>

    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />


	<?php if(get_field('code_head', 'options')): ?>
		<?php the_field('code_head', 'options'); ?>
	<?php endif; ?>
</head>

<body <?php body_class($has_hero); ?>>
<?php if(get_field('code_body_top', 'options')): ?>
	<?php the_field('code_body_top', 'options'); ?>
<?php endif; ?>

<?php wp_body_open(); ?>

<div id="page" class="site">

	<?php get_template_part('template-parts/header/nab-banner'); ?>

	<header class="site-header<?php if($nab_banner == TRUE): ?> has-banner<?php endif; ?>">

		<div class="site-header-wrapper">
			<?php get_template_part('template-parts/header/logo'); ?>

			<?php get_template_part('template-parts/header/desktop-navigation'); ?>

			<?php get_template_part('template-parts/header/search'); ?>

			<?php get_template_part('template-parts/header/cta'); ?>

			<?php get_template_part('template-parts/header/hamburger'); ?>
		</div>
	</header>
	
	<?php get_template_part('template-parts/header/mobile-navigation'); ?>

	<?php get_template_part('template-parts/header/navigation'); ?>

	<main class="site-content">
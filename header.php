<?php
	global $has_hero;
	$nab_banner = get_field('nab_banner_show', 'options');
	$banner = get_field('banner_show', 'options');
	
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	
	<?php wp_head(); ?>

	<?php 
		// Load Swiper CSS only on pages that use it - use preload for better performance
		if(has_swiper_content()): ?>
		<link rel="preload" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
		<noscript><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"></noscript>
		<style>
		/* Critical CSS to prevent layout shift and multiple slides showing before Swiper initialization */
		.hero-swiper:not(.swiper-initialized) .swiper-wrapper {
			transform: none !important;
			display: block;
		}
		.hero-swiper:not(.swiper-initialized) .swiper-slide {
			opacity: 0;
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
		}
		.hero-swiper:not(.swiper-initialized) .swiper-slide:first-child {
			opacity: 1 !important;
			position: relative;
		}
		/* Hide pagination until Swiper is ready */
		.hero-swiper:not(.swiper-initialized) .swiper-pagination {
			display: none;
		}
		/* Values swiper specific styles to prevent layout shift */
		.values-swiper:not(.swiper-initialized) .swiper-wrapper {
			display: flex;
			gap: 2rem;
			overflow: hidden;
		}
		.values-swiper:not(.swiper-initialized) .swiper-slide {
			flex-shrink: 0;
			width: 25rem;
		}
		.values-swiper:not(.swiper-initialized) .swiper-slide:not(:nth-child(-n+3)) {
			display: none;
		}
		/* Optimize swiper container for LCP */
		.swiper:not(.swiper-initialized) .swiper-wrapper {
			display: block;
		}
		.swiper:not(.swiper-initialized) .swiper-slide {
			display: block;
			width: 100%;
		}
		.swiper:not(.swiper-initialized) .swiper-slide:not(:first-child) {
			display: none;
		}
		</style>
	<?php endif; ?>

    <?php
        // Only load AOS CSS on pages that actually use AOS animations
        if (has_aos_animations()): ?>
        <link rel="preload" href="https://unpkg.com/aos@2.3.1/dist/aos.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css"></noscript>
    <?php endif; ?>


	<?php if(get_field('code_head', 'options')): ?>
		<?php 
			echo od_delay_rb2b_html(get_field('code_head', 'option'));
		?>
	<?php endif; ?>
</head>

<body <?php body_class($has_hero); ?>>
<?php if(get_field('code_body_top', 'options')): ?>
	<?php echo get_field('code_body_top', 'options'); ?>
<?php endif; ?>

<?php wp_body_open(); ?>

<div id="page" class="site">

	<?php get_template_part('template-parts/header/nab-banner'); ?>

	<?php get_template_part('template-parts/header/banner'); ?>

	<header class="site-header<?php if($nab_banner == TRUE || $banner == TRUE): ?> has-banner<?php endif; ?>">

		<div class="site-header-wrapper">
			<?php get_template_part('template-parts/header/logo'); ?>

			<?php get_template_part('template-parts/header/desktop-navigation'); ?>

			<?php get_template_part('template-parts/header/search'); ?>

			<?php get_template_part('template-parts/header/cta'); ?>
			
			<?php get_template_part('template-parts/header/login'); ?>

			<?php get_template_part('template-parts/header/hamburger'); ?>
		</div>
	</header>
	
	<?php get_template_part('template-parts/header/mobile-navigation'); ?>

	<?php get_template_part('template-parts/header/navigation'); ?>

	<main class="site-content">
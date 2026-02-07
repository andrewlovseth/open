<?php get_header(); ?>

<section class="error-404 grid">

	<div class="headline">
		<p class="section-title small">404</p>
		<h1 class="page-title">Page not found</h1>
	</div>

	<div class="copy copy-1">
		<p>The page you're looking for doesn't exist or has been moved.</p>
	</div>

	<div class="cta">
		<a class="btn blue" href="<?php echo esc_url(home_url('/')); ?>">Go to Homepage</a>
	</div>

</section>

<?php get_footer(); ?>

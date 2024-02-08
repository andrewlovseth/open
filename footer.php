	</main> <!-- .site-content -->

	<footer class="site-footer grid">
		<?php get_template_part('template-parts/footer/pre-footer'); ?>

		<div class="footer-container">
			<?php get_template_part('template-parts/footer/logo'); ?>
			
			<?php get_template_part('template-parts/footer/newsletter-form'); ?>

			<?php get_template_part('template-parts/footer/nav'); ?>
		</div>

		<?php get_template_part('template-parts/footer/legal'); ?>
	</footer>

	<?php get_template_part('template-parts/footer/contact-form'); ?>

	<?php get_template_part('template-parts/footer/demo-form'); ?>

	<?php get_template_part('template-parts/footer/nab-overlay'); ?>

<?php wp_footer(); ?>

<?php if(get_field('code_body_bottom', 'options')): ?>
	<?php echo get_field('code_body_bottom', 'options'); ?>
<?php endif; ?>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
AOS.init();
</script>

</div> <!-- .site -->

</body>
</html>
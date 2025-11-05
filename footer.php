	</main> <!-- .site-content -->
    
	<?php get_template_part('template-parts/footer/promo'); ?>

	<footer class="site-footer grid">

		<div class="footer-container">
			<?php get_template_part('template-parts/footer/logo'); ?>
			
			<?php get_template_part('template-parts/footer/newsletter-form-new'); ?>

			<?php get_template_part('template-parts/footer/nav'); ?>
		</div>

		<?php get_template_part('template-parts/footer/legal'); ?>
	</footer>

	<?php // get_template_part('template-parts/footer/contact-form'); ?>

	<?php // get_template_part('template-parts/footer/demo-form'); ?>

	<?php get_template_part('template-parts/footer/nab-overlay'); ?>

<?php wp_footer(); ?>

<?php if(get_field('code_body_bottom', 'options')): ?>
	<?php echo get_field('code_body_bottom', 'options'); ?>
<?php endif; ?>

<?php if (has_aos_animations()): ?>
<script>
// Load AOS only when needed and after user interaction or page load
(function() {
    let aosLoaded = false;
    
    function loadAOS() {
        if (aosLoaded) return;
        aosLoaded = true;
        
        const script = document.createElement('script');
        script.src = 'https://unpkg.com/aos@2.3.1/dist/aos.js';
        script.onload = function() {
            AOS.init({
                duration: 800,
                once: true,
                offset: 50
            });
        };
        document.head.appendChild(script);
    }
    
    // Load on first user interaction for better LCP
    ['scroll', 'mousemove', 'keydown', 'touchstart'].forEach(function(event) {
        document.addEventListener(event, loadAOS, { once: true, passive: true });
    });
    
    // Fallback: load after page load with delay
    window.addEventListener('load', function() {
        setTimeout(loadAOS, 1000);
    });
})();
</script>
<?php endif; ?>

</div> <!-- .site -->

</body>
</html>
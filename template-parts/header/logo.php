<?php
$header = get_field('header', 'options');
$logo = $header['logo'];
if( $logo ): ?>

    <div class="site-logo">
        <a href="<?php echo site_url(); ?>" aria-label="Go to the OpenDrives homepage">
            <?php get_template_part('src/svg/logo'); ?>
        </a>
    </div>

<?php endif; ?>
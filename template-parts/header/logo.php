<?php $logo = get_field('logo', 'options'); if( $logo ): ?>
    <div class="site-logo">
        <a href="<?php echo site_url(); ?>">
            <?php echo wp_get_attachment_image($logo['ID'], 'full'); ?>
        </a>
    </div>
<?php endif; ?>
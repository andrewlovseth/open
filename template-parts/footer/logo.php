<?php

    $logo = get_field('footer_logo', 'options');

?>

<div class="footer-logo">
    <a href="<?php echo site_url(); ?>">
        <?php echo wp_get_attachment_image($logo['ID'], 'full'); ?>
    </a>
</div>
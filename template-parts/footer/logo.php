<?php

    $logo = get_field('footer_logo', 'options');

?>

<div class="footer-logo">
    <a href="<?php echo site_url(); ?>" aria-label="Go to the OpenDrives homepage">
        <?php echo print_svg($logo['url']); ?>
    </a>
</div>
<?php

    $logo = get_field('footer_logo', 'options');

?>

<div class="footer-logo">
    <a href="<?php echo site_url(); ?>">
        <?php echo print_svg($logo['url']); ?>
    </a>
</div>
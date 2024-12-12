<?php

    $pe = get_field('performance_engine');
    $background = $pe['background'];
    $logo = $pe['logo'];
    $copy = $pe['copy'];

 ?>

<section class="pe grid" style="background-image: url(<?php echo wp_get_attachment_image_url($background['ID'], 'full'); ?>);">
    <div class="pe__logo">
        <div class="pe__logo-wrapper">            
            <?php echo print_svg($logo['url']); ?>
        </div>
    </div>

    <div class="pe__copy | copy copy-2 extended">
        <?php echo $copy; ?>
    </div>
</section>
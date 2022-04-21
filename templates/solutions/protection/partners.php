<?php

    $partners = get_field('partners');
    $headline = $partners['headline'];
    $logos = $partners['gallery'];

?>

<section class="partners grid">
    <div class="section-header center">
        <h2 class="section-title small"><?php echo $headline; ?></h2>
    </div>

    <?php if( $logos ): ?>
        <div class="logo-gallery four-col-grid">
            <?php foreach( $logos as $logo ): ?>
                <div class="logo">
                    <?php echo wp_get_attachment_image($logo['ID'], 'full'); ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</section>
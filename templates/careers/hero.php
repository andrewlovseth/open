<?php

    $hero = get_field('hero');
    $photo = $hero['image'];
    if($photo): ?>
    
    <section class="hero-compact">
        <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
    </section>
    
<?php endif; ?>
<?php

    $logos = get_field('customers'); 

?>

<section class="customers grid">
    <?php if( $logos ): ?>
        <div class="customer-grid">
            <?php $i = 1; foreach( $logos as $logo ): ?>
                <?php
                    $delay = 400 + (25 * $i);
                ?>

                <div class="logo" data-aos="fade-up" data-aos-duration="600" data-aos-delay="<?php echo $delay; ?>" data-aos-once="true">
                    <div class="image">
                        <?php echo wp_get_attachment_image($logo['ID'], 'full'); ?>
                    </div>                    
                </div>
            <?php $i++; endforeach; ?>
        </div>
    <?php endif; ?>
</section>
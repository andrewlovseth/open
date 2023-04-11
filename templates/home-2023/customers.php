<?php

    $logos = get_field('customers'); 

?>

<section class="customers">
    <?php if( $logos ): ?>
        <?php $i = 1; foreach( $logos as $logo ): ?>
            <?php
                $delay = 400 + (25 * $i);
            ?>

            <div class="logo" data-aos="fade-up" data-aos-duration="600" data-aos-delay="<?php echo $delay; ?>" data-aos-once="true">
                <div class="image">
                    <?php echo print_svg($logo['url']); ?>
                </div>                    
            </div>
        <?php $i++; endforeach; ?>
    <?php endif; ?>
</section>
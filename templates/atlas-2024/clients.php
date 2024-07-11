<?php

    $logos = get_field('clients'); 

?>

<section class="clients">
    <?php if( $logos ): ?>
        <?php foreach( $logos as $logo ): ?>

            <div class="logo">
                <div class="image">
                    <?php echo print_svg($logo['url']); ?>
                </div>                    
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</section>
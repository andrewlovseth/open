<?php
    $headline = get_field('customers_headline');
    $logos = get_field('customers'); 
?>

<section class="customers grid">
    <div class="section-header center">
        <h3 class="module-title"><?php echo $headline; ?></h3>
    </div>
    
    <?php if( $logos ): ?>
        <div class="customer-grid">
            <?php foreach( $logos as $logo ): ?>
                <div class="logo">

                    <div class="image">
                        <?php echo wp_get_attachment_image($logo['ID'], 'full'); ?>
                    </div>                    
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>
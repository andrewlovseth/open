<?php
    $customers_section_header = get_field('customers_section_header');
    $headline = $customers_section_header['headline'];
    $copy = $customers_section_header['copy'];
    $logos = get_field('customers'); 
?>

<section class="customers grid">
    <div class="section-header center">
        <div class="headline">
            <h2 class="section-title"><?php echo $headline; ?></h2>
        </div>

        <div class="copy copy-1">
            <?php echo $copy; ?>
        </div>        
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
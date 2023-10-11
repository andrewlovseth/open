<?php

    $content = get_field('content');
    $headline = $content['headline'];
    $copy = $content['copy'];


?>

<div class="demo__content">
    <div class="demo__header">
        <h3 class="demo__title section-title"><?php echo $headline; ?></h3>
    </div>

    <div class="demo__copy copy copy-2 extended">
        <?php echo $copy; ?>
    </div>


<?php
    $company = get_page_by_path( 'company' );
    $customers_section_header = get_field('customers_section_header', $company);
    $headline = $customers_section_header['headline'];
    $copy = $customers_section_header['copy'];
    $logos = get_field('customers', $company); 




?>

    <div class="customers grid">
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
                    
                    <?php if(is_svg($logo['url'])): ?>
                        <div class="logo">
                            <div class="image">
                                <?php echo print_svg($logo['url']); ?>
                            </div>                    
                        </div>
                    <?php endif; ?>

                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

</div>
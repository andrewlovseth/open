<?php

    if(get_field('customers_alt_logos')) {
        $logos = get_field('customers_alt_logos');
    } else {
        $company = get_page_by_path('company');
        $logos = get_field('customers', $company); 
    }

    $customers = get_field('customers');
    $headline = $customers['headline'];
    $copy = $customers['copy'];
    $link = $customers['link'];
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
                
                <?php if(is_svg($logo['url'])): ?>
                    <div class="logo <?php echo $logo['title']; ?>">
                        <div class="image">
                            <?php echo print_svg($logo['url']); ?>
                        </div>                    
                    </div>
                <?php endif; ?>

            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php 
        if( $link ): 
        $link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';
    ?>

        <div class="cta center">
            <a class="btn white" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
        </div>

    <?php endif; ?>

</section>


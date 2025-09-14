<?php

$customer_driven = get_field('customer_driven');

if ($customer_driven):
    $headline = $customer_driven['headline'];
    $copy_1 = $customer_driven['copy_1'];
    $photo_1 = $customer_driven['photo_1'];
    $copy_2 = $customer_driven['copy_2'];
    $photo_2 = $customer_driven['photo_2'];
?>

    <section class="customer-driven grid">

        <?php if ($headline): ?>
            <h2 class="customer-driven__headline section-headline-2025 medium"><?php echo $headline; ?></h2>
        <?php endif; ?>
        
        <div class="customer-driven__content">
            <div class="customer-driven__card customer-driven__card-1">
                <?php if ($photo_1): ?>
                    <div class="customer-driven__photo-1">
                        <?php echo wp_get_attachment_image($photo_1['ID'], 'full'); ?>
                    </div>
                <?php endif; ?>
                
                <?php if ($copy_1): ?>
                    <div class="customer-driven__copy-1 | copy copy-2 secondary-color extended">
                        <?php echo $copy_1; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="customer-driven__card customer-driven__card-2">
                <?php if ($photo_2): ?>
                    <div class="customer-driven__photo-2">
                        <?php echo wp_get_attachment_image($photo_2['ID'], 'full'); ?>
                    </div>
                <?php endif; ?>
                
                <?php if ($copy_2): ?>
                    <div class="customer-driven__copy-2 | copy copy-2 secondary-color extended">
                        <?php echo $copy_2; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="customer-driven__blob">
            <img src="<?php echo get_template_directory_uri(); ?>/src/images/home-2025/blob-small-blue-2.png" role="presentation" alt="">
        </div>
    </section>

<?php endif; ?>

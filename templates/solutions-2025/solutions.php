<?php

$solutions = get_field('solutions');

if ($solutions):
    $headline = $solutions['headline'];
    $sub_headline = $solutions['sub_headline'];
    $products = $solutions['products'];
?>

    <section class="solutions grid">
        <div class="solutions__content">
            <?php if ($headline): ?>
                <h2 class="solutions__headline section-headline-2025"><?php echo $headline; ?></h2>
            <?php endif; ?>
            
            <?php if ($sub_headline): ?>
                <h3 class="solutions__sub-headline sub-headline"><?php echo $sub_headline; ?></h3>
            <?php endif; ?>

            <?php if ($products): ?>
                <div class="solutions__products">
                    <?php foreach ($products as $product): ?>
                        <div class="solutions__product">
                            <?php if ($product['logo']): ?>
                                <div class="solutions__product-logo">
                                    <?php echo wp_get_attachment_image($product['logo']['ID'], 'full'); ?>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($product['headline']): ?>
                                <h4 class="solutions__product-headline"><?php echo $product['headline']; ?></h4>
                            <?php endif; ?>
                            
                            <?php if ($product['copy']): ?>
                                <div class="solutions__product-copy | copy copy-3 secondary-color extended">
                                    <?php echo $product['copy']; ?>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($product['link']): ?>
                                <div class="solutions__product-link">
                                    <a href="<?php echo $product['link']['url']; ?>" 
                                    <?php if ($product['link']['target']): ?>target="<?php echo $product['link']['target']; ?>"<?php endif; ?>
                                    class="btn btn-primary">
                                        <?php echo $product['link']['title']; ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <img class="solutions__rect-right" src="<?php echo get_template_directory_uri(); ?>/src/images/home-2025/rect-purple-blue.png" role="presentation" alt="">
    </section>

<?php endif; ?>

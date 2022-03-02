<?php if(have_rows('products')): ?>

    <div class="products">

        <div class="section-header">
            <h3 class="module-title">Products In Use</h3>
        </div>

        <?php while(have_rows('products')): the_row(); ?>

            <?php

                $product = get_sub_field('product');
                $label_override = get_sub_field('label_override');
                $search = get_field('search', $product->ID);
                $photo = $search['photo'];
                $description = $search['description'];
                $label = $search['label'];

                if($label_override) {
                    $title = $label_override;
                } elseif($search['title']) {
                    $title = $search['title'];
                } else {
                    $title = get_the_title( $product->ID );
                }     

            ?>

            <div class="product">
                <a href="<?php echo get_permalink( $product->ID ); ?>">
                    <div class="photo">
                        <?php echo wp_get_attachment_image($photo['ID'], 'medium'); ?>
                    </div>

                    <div class="info">
                        <h4><?php echo $title; ?></h4>
                    </div>        
                </a>
            </div>

        <?php endwhile; ?>

    </div>

<?php endif; ?>
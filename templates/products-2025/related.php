<?php

$related = get_field('related');
$related_headline = get_field('related_headline');
$related_copy = get_field('related_copy');


if( $related ):
$count = count($related);


?>
    <section class="related grid">

        <img class="related__rect-left" src="<?php echo get_template_directory_uri(); ?>/src/images/home-2025/rect-pink-green-vert.png" role="presentation" alt="">


        <div class="section-header">
            <h2 class="section-headline-2025"><?php echo $related_headline; ?></h2>

            <div class="related__copy | copy copy-2 secondary-color">
                <?php echo $related_copy; ?>
            </div>
        </div>        

        <div class="related-grid related-grid-<?php echo $count; ?>">
            <?php foreach( $related as $item ): ?>
                
                <?php
                    $post_type = get_post_type( $item->ID );
                    $args = ['item' => $item];
                    get_template_part('template-parts/global/related/' . $post_type, null, $args);
                ?>

            <?php endforeach; ?>
        </div>
    </section>
<?php endif; ?>
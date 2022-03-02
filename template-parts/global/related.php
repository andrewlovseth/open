<?php

$related = get_field('related');
$related_headline = get_field('related_headline');

if($related_headline) {
    $headline = $related_headline;
} else {
    $headline = 'Related';
}

if( $related ):
$count = count($related);


?>

    <div class="related">
        <div class="section-header">
            <h2 class="section-title"><?php echo $headline; ?></h2>
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
    </div>

<?php endif; ?>
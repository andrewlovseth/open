<?php

    $args = wp_parse_args($args);
    if(!empty($args)) {
        $item = $args['item']; 
    }

    $post_type = get_post_type( $item->ID );
    $search = get_field('search', $item->ID);
    $photo = $search['photo'];

    if($search['title']) {
        $title = $search['title'];
    } else {
        $title = get_the_title( $item->ID );
    }

    if($search['description']) {
        $description = $search['description'];
    } else {
        $description = wp_trim_words( get_the_content('', '', $item->ID), 24, '...' );
    }


    $terms = get_the_terms( $item->ID, 'news_types');
    $term = $terms[0]->name;

?>

<div class="item resource">
    <a href="<?php echo get_permalink( $item->ID ); ?>">
        <?php if($photo): ?>
            <div class="photo">
                <?php echo wp_get_attachment_image($photo['ID'], 'medium'); ?>
            </div>
        <?php endif; ?>

        <div class="info">
            <?php if($term): ?>
                <span class="item__label"><?php echo $term; ?></span>
            <?php endif; ?>

            <?php if($title): ?>
                <h3><?php echo $title; ?></h3>
            <?php endif; ?>

            <?php if($description): ?>
                <div class="copy copy-3">
                    <p><?php echo $description; ?></p>
                </div>
            <?php endif; ?>
        </div>
        
    </a>
</div>
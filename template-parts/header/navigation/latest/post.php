<?php

    $args = wp_parse_args($args);
    if(!empty($args)) {
        $item = $args['item']; 
    }

    $post_type = get_post_type( $item->ID );
    $search = get_field('search', $item->ID);

    if($search['title']) {
        $title = $search['title'];
    } else {
        $title = get_the_title( $item->ID );
    }

    if($search['photo']) {
        $photo = $search['photo']['ID'];
    } else {
        $photo = get_post_thumbnail_id($item->ID);
    }

    if($search['description']) {
        $description = wp_trim_words( $search['description'], 24, '...' );
    } else {
        $description = wp_trim_words( get_the_content('', '', $item->ID), 24, '...' );
    }

?>

<div class="post post-type-post">
    <a href="<?php echo get_permalink($item->ID); ?>">
        <?php if($photo): ?>
            <div class="photo">
                <?php echo wp_get_attachment_image($photo, 'thumbnail'); ?>
            </div>
        <?php endif; ?>

        <div class="info">
            <div class="type">
                <h5>Blog</h5>
            </div>
            
            <div class="headline">
                <h4><?php echo $title; ?></h4>
            </div>

            <div class="copy copy-4">
                <p><?php echo $description; ?></p>
            </div>
        </div>
    </a>
</div>
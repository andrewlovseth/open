<?php

    $args = wp_parse_args($args);
    if(!empty($args)) {
        $item = $args['item']; 
    }

    $post_type = get_post_type( $item->ID );
    $search = get_field('search', $item->ID);
    $description = $search['description'];

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

    $class_list = "search-result customer-story";
    if($photo === NULL) {
        $class_list .= " no-photo";
    }

?>

<div class="<?php echo $class_list; ?>">
    <a href="<?php echo get_permalink( $item->ID ); ?>">
        <?php if($photo): ?>
            <div class="photo">
                <?php echo wp_get_attachment_image($photo, 'medium'); ?>
            </div>
        <?php endif; ?>

        <div class="info">
            <h4>Customer Story</h4>

            <?php if($title): ?>
                <h3><?php echo $title; ?></h3>
            <?php endif; ?>

            <?php if($description): ?>
                <div class="copy copy-2">
                    <p><?php echo $description; ?></p>
                </div>
            <?php endif; ?>
        </div>        
    </a>
</div>
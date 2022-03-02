<?php

    $args = wp_parse_args($args);
    if(!empty($args)) {
        $item = $args['item']; 
    }

    $post_type = get_post_type( $item->ID );
    $search = get_field('search', $item->ID);
    $photo = $search['photo'];
    $description = $search['description'];
    $label = $search['label'];

    if($search['title']) {
        $title = $search['title'];
    } else {
        $title = get_the_title( $item->ID );
    }     

?>

<div class="item page">
    <a href="<?php echo get_permalink( $item->ID ); ?>">
        <div class="photo">
            <?php echo wp_get_attachment_image($photo['ID'], 'medium'); ?>
        </div>

        <div class="info">
            <h4><?php echo $label; ?></h4>
            <h3><?php echo $title; ?></h3>

            <div class="copy copy-3">
                <p><?php echo $description; ?></p>
            </div>
        </div>        
    </a>
</div>
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
        <?php if($photo): ?>    
            <div class="photo">
                <?php echo wp_get_attachment_image($photo['ID'], 'medium'); ?>
            </div>
        <?php endif; ?>

        <div class="info">
            <?php if($label): ?>
                <span class="item__label"><?php echo $label; ?></span>
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
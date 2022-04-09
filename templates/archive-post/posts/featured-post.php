<?php

    $args = wp_parse_args($args);
    if(!empty($args)) {
        $blog = $args['blog']; 
        $count = $args['count']; 
    }

?>

<article class="teaser blog blog-<?php echo $count; ?>">
    <a href="<?php echo get_permalink( $blog->ID ); ?>">
        <div class="photo">
            <?php echo get_the_post_thumbnail($blog->ID ); ?>
        </div>

        <div class="info">
            <h4><?php the_time('m/d/Y'); ?></h4>
            <h3><?php echo get_the_title( $blog->ID ); ?></h3>
        </div>
    </a>
</article>
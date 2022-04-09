<?php

    $args = wp_parse_args($args);
    if(!empty($args)) {
        $blog = $args['blog']; 
    }

?>

<article class="teaser blog">
    <a href="<?php echo get_permalink( $blog->ID ); ?>">
        <div class="photo">
            <div class="photo-wrapper">
                <?php echo get_the_post_thumbnail($blog->ID ); ?>
            </div>
        </div>

        <div class="info">
            <div class="date">
                <h4><?php $date = get_the_time('l, F j, Y', $blog->ID); echo strtolower($date); ?></h4>
            </div>

            <div class="post-title">
                <h3><?php echo get_the_title( $blog->ID ); ?></h3>
            </div>
        </div>
    </a>
</article>
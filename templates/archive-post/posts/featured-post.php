<?php

    $args = wp_parse_args($args);
    if(!empty($args)) {
        $blog = $args['blog']; 
        $count = $args['count']; 
    }

    $search = get_field('search', $blog->ID);
    $excerpt = $search['description'];

    $color_photo = get_field('color_photo', $blog->ID);
    $author_type = get_field('author_type', $blog->ID);
    $team_authors = get_field('team_author', $blog->ID);
    $guest_author = get_field('guest_author', $blog->ID);

?>

<article class="teaser blog blog-<?php echo $count; ?>">
    <a href="<?php echo get_permalink( $blog->ID ); ?>">
        <div class="photo<?php if($color_photo == TRUE): ?> photo-color<?php endif; ?>">
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

            <?php if($count === 1): ?>
                <div class="copy copy-3">
                    <p><?php echo $excerpt; ?></p>
                </div>
            <?php endif; ?>



        </div>
    </a>
</article>
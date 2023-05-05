<?php

    $args = wp_parse_args($args);
    if(!empty($args)) {
        $news = $args['news']; 
    }

    $news_types = get_the_terms( $news->ID, 'news_types');
    $news_type = $news_types[0]->name;
    $news_type_slug = $news_types[0]->slug;
    $copy = get_field('search_description', $news->ID);

?>

<article class="teaser <?php echo $news_type_slug; ?>">
    <a href="<?php echo get_permalink( $news->ID ); ?>">
        <div class="photo">
            <?php echo get_the_post_thumbnail($news->ID ); ?>
        </div>

        <div class="info">
            <div class="header">
                <h4><?php echo $news_type; ?> | <?php echo get_the_time('M j Y', $news->ID); ?></h4>
                <h3><?php echo get_the_title( $news->ID ); ?></h3>
            </div>

            <?php if($copy): ?>
                <div class="body copy copy-3">
                    <?php echo $copy; ?>
                </div>
            <?php endif; ?>
        </div>
    </a>
</article>
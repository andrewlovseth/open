<?php

    $args = wp_parse_args($args);
    if(!empty($args)) {
        $news = $args['news']; 
    }

    $news_types = get_the_terms( $news->ID, 'news_types');
    $news_type = $news_types[0]->name;
    $news_type_slug = $news_types[0]->slug;

    $in_the_press = get_field('in_the_press', $news->ID);
    $publication = $in_the_press['publication'];
    $logo = $in_the_press['publication_logo'];
    $link = $in_the_press['link'];
    $date = $in_the_press['date_of_publication'];
    $author = $in_the_press['author'];
    $external = $in_the_press['external'];

    $copy = get_field('search_description', $news->ID);

    if($external) {
        $news_link = $link;
    } else {
        $news_link = get_permalink( $news->ID );
    }

?>

<article class="teaser <?php echo $news_type_slug; ?>">
    <a href="<?php echo $news_link; ?>"<?php if($external): ?> target="window"<?php endif; ?>>
        <div class="photo">
            <?php echo get_the_post_thumbnail($news->ID ); ?>
        </div>

        <div class="info">
            <div class="publication-logo">
                <?php echo wp_get_attachment_image($logo['ID'], 'medium'); ?>
            </div>

            <div class="details">
                <h4><?php echo $news_type; ?> | <?php echo $date; ?></h4>
                <h3><?php echo get_the_title( $news->ID ); ?></h3>

                <?php if($copy): ?>
                    <div class="body copy copy-3">
                        <?php echo $copy; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </a>
</article>
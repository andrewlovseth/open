<?php

    $args = wp_parse_args($args);
    if(!empty($args)) {
        $blog = $args['blog']; 
        $count = $args['count']; 
    }

    $search = get_field('search', $blog->ID);
    $excerpt = $search['description'];


    $author_type = get_field('author_type', $blog->ID);
    $team_authors = get_field('team_author', $blog->ID);
    $guest_author = get_field('guest_author', $blog->ID);

?>

<article class="teaser blog blog-<?php echo $count; ?>">
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

            <?php if($count === 1): ?>
                <div class="copy copy-3">
                    <p><?php echo $excerpt; ?></p>
                </div>
            <?php endif; ?>

            <?php if($author_type === 'team'): ?>
                <?php if($team_authors): ?>
                    <div class="authors">

                            <?php 
                                $name = get_the_title($team_authors[0]->ID);
                                $meta = get_field('position', $team_authors[0]->ID);
                                $photo = get_field('blog_photo', $team_authors[0]->ID);

                                if(get_field('blog_photo', $team_authors[0]->ID)) {
                                    $photo = get_field('blog_photo', $team_authors[0]->ID);
                                } else {
                                    $photo = get_field('photo', $team_authors[0]->ID);
                                }
                            ?>

                            <div class="author">
                                <div class="author-photo">
                                    <?php echo wp_get_attachment_image($photo['ID'], 'thumbnail'); ?>
                                </div>

                                <div class="author-info">
                                    <div class="name">
                                        <h4><?php echo $name; ?></h4>
                                    </div>

                                    <div class="meta">
                                        <h5><?php echo $meta; ?></h5>
                                    </div>
                                </div>
                            </div>

                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php if($author_type === 'guest'): ?>
                <?php if($guest_author): ?>
                    <div class="authors">
                        <?php                
                            $name = $guest_author['name'];
                            $meta = $guest_author['meta'];
                            $photo = $guest_author['photo'];
                        ?>

                        <div class="author">
                            <div class="author-photo">
                                <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
                            </div>

                            <div class="author-info">
                                <div class="name">
                                    <h4><?php echo $name; ?></h4>
                                </div>

                                <div class="meta">
                                    <h5><?php echo $meta; ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            <?php endif; ?>

        </div>
    </a>
</article>
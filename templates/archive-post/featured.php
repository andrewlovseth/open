<?php
    $blog = get_field('blog', 'options');
    $featured_blog_items = $blog['featured'];
    if( $featured_blog_items ):
?>

    <section class="featured grid">
        <?php $count = 1; foreach( $featured_blog_items as $blog_item ): ?>

            <?php
                $args = ['blog' => $blog_item, 'count' => $count];
                get_template_part('templates/archive-post/posts/featured-post', null, $args);
            ?>

        <?php $count++; endforeach; ?>
    </section>

<?php endif; ?>
<?php
    $news = get_field('news', 'options');
    $featured_news_items = $news['featured'];
    if( $featured_news_items ):
?>

    <section class="featured grid">
        <div class="featured-container">
            <?php foreach( $featured_news_items as $news_item ): ?>

                <?php
                    $news_types = get_the_terms( $news_item->ID, 'news_types');
                    $news_type_slug = $news_types[0]->slug;

                    $args = ['news' => $news_item];
                    get_template_part('templates/archive-news/' . $news_type_slug, null, $args);
                ?>

            <?php endforeach; ?>
        </div>
    </section>

<?php endif; ?>
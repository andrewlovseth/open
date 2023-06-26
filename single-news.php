<?php get_header(); ?>

    <?php get_template_part('templates/company/nav'); ?>

<?php
    $news_types = get_the_terms(get_the_ID(), 'news_types');
    $news_type_slug = $news_types[0]->slug;
    $news_type = $news_types[0]->name;

    $in_the_press = get_field('in_the_press', $post->ID);
    $publication = $in_the_press['publication'];
    $logo = $in_the_press['publication_logo'];
    $link = $in_the_press['link'];
    $date = $in_the_press['date_of_publication'];
    $author = $in_the_press['author'];

?>


<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>

    <article <?php post_class('grid'); ?>>
        <section class="article-header">
            <div class="back">
                <a href="<?php echo site_url('/news/'); ?>">Newsroom</a>
            </div>

            <h1><?php the_title(); ?></h1>
        </section>

        <section class="article-body">
            <div class="type">
                <h4><?php echo $news_type; ?></h4>
            </div>
            
            <?php if(get_the_post_thumbnail()): ?>
                <div class="featured-image">
                    <?php the_post_thumbnail(); ?>

                    <?php if(get_the_post_thumbnail_caption()): ?>
                        <div class="caption">
                            <p><?php the_post_thumbnail_caption(); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            
            <?php get_template_part('template-parts/global/share-links'); ?>

            <?php if($news_type_slug === 'in-the-press'): ?>

                <div class="publication">
                    <div class="logo">
                        <?php echo wp_get_attachment_image($logo['ID'], 'full'); ?>
                    </div>

                    <div class="info">
                        <div class="byline">
                            <p>by <span class="author"><?php echo $author; ?></span> <span class="date"><?php echo $date; ?></span></p>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <div class="copy copy-2 extended">
                <?php the_content(); ?>
            </div>
            
            <?php if($news_type_slug === 'in-the-press'): ?>
                <?php if($link): ?>

                    <div class="read-more">
                        <div class="cta">
                            <a href="<?php echo $link; ?>" class="btn blue" target="window">Read full story</a>
                        </div>
                    </div>

                <?php endif; ?>
            <?php endif; ?>
            
        </section>

        <section class="article-footer">
            <?php get_template_part('template-parts/global/related'); ?>
        </section>
    </article>

<?php endwhile; endif; ?>








<?php get_footer(); ?>
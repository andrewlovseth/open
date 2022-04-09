<section class="article-body">                
    <?php if(get_the_post_thumbnail()): ?>
        <div class="featured-image">
            <?php the_post_thumbnail(); ?>
        </div>
    <?php endif; ?>

    <div class="copy copy-2 extended">
        <?php the_content(); ?>
    </div>
</section>
<div class="share-links">

    <h4>Share</h4>

    <div class="share-link facebook">
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank">
            <?php get_template_part('src/svg/icon-facebook'); ?>
        </a>
    </div>

    <div class="share-link twitter">
        <a href="https://twitter.com/intent/tweet?text=<?php echo urlencode(get_the_title()); ?>&url=<?php echo urlencode(get_permalink()); ?>" target="_blank">
            <?php get_template_part('src/svg/icon-twitter'); ?>
        </a>
    </div>

    <div class="share-link linkedin">
        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>" target="_blank">
            <?php get_template_part('src/svg/icon-linkedin'); ?>
        </a>
    </div>

    <div class="share-link email">
        <a href="mailto:?subject=OpenDrives: <?php echo get_the_title(); ?>&body=<?php echo get_permalink(); ?>" target="_blank">
            <?php get_template_part('src/svg/icon-email'); ?>
        </a>
    </div>

    <div class="share-link print">
        <a href="#" class="js-print-link">
            <?php get_template_part('src/svg/icon-print'); ?>
        </a>
    </div>
</div>
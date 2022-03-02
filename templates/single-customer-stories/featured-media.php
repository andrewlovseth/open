<?php
    $video = get_field('video');
    $show_video = $video['show'];
    $source = $video['source'];
    $video_id = $video['id'];

?>

<?php if($show_video): ?>

    <div class="featured-video">
        <?php if($source === 'youtube'): ?>

            <iframe width="1920" height="1080" src="https://www.youtube.com/embed/<?php echo $video_id; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

        <?php endif; ?>

        <?php if($source === 'vimeo'): ?>

        <?php endif; ?>

    </div>

<?php else: ?>

    <?php if(get_the_post_thumbnail()): ?>
        <div class="featured-image">
            <?php the_post_thumbnail(); ?>
        </div>
    <?php endif; ?>

<?php endif; ?>
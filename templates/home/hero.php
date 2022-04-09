<?php

    $hero = get_field('hero');
    $video = $hero['video'];

?>

<section class="grid hero">
    <div class="video">
        <div class="video-wrapper">
            <?php echo $video; ?>
        </div>
    </div>
</section>
<?php

    $intro = get_field('intro');
    $headline = $intro['headline'];
    $copy = $intro['copy'];

?>

<section class="intro grid">
    <?php if($headline): ?>
        <div class="headline" data-aos="fade-up" data-aos-duration="800" data-aos-once="true">
            <h2 class="section-title"><?php echo $headline; ?></h2>
        </div>
    <?php endif; ?>

    <?php if($copy): ?>
        <div class="copy copy-1 extended" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400" data-aos-once="true">
            <?php echo $copy; ?>
        </div>
    <?php endif; ?>
</section>
<?php

    $about = get_field('about');
    $copy = $about['copy'];

?>

<section class="about grid">
    <?php if($copy): ?>
        <div class="copy copy-1 extended" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400" data-aos-once="true">
            <?php echo $copy; ?>
        </div>
    <?php endif; ?>
</section>
<?php

    $about = get_field('about');
    $copy = $about['copy'];

?>

<section class="about grid">
    <?php if($copy): ?>
        <div class="copy copy-1 extended">
            <?php echo $copy; ?>
        </div>
    <?php endif; ?>
</section>
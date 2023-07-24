<?php

    $content = get_field('content');
    $headline = $content['headline'];
    $copy = $content['copy'];

?>

<div class="demo__content">
    <div class="demo__header">
        <h3 class="demo__title section-title"><?php echo $headline; ?></h3>
    </div>

    <div class="demo__copy copy copy-2 extended">
        <?php echo $copy; ?>
    </div>
</div>
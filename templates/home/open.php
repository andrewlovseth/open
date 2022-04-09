<?php

    $open = get_field('open');
    $headline = $open['headline'];
    $copy = $open['copy'];
    $background_desktop = $open['background_desktop'];

?>

<section class="open grid">
    <?php if($headline): ?>
        <div class="headline">
            <h2 class="section-title"><?php echo $headline; ?></h2>
        </div>
    <?php endif; ?>

    <?php if($copy): ?>
        <div class="copy copy-1 extended">
            <?php echo $copy; ?>
        </div>
    <?php endif; ?>

    <style>
        section.open {
            background-image: url(<?php echo $background_desktop['url']; ?>);
        }
    </style>
</section>
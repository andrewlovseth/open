<?php

    $essentials = get_field('essentials');
    $title = $essentials['title'];
    $copy = $essentials['copy'];

 ?>

<section class="essentials overview__panel">
    <div class="overview__panel-header">
        <?php get_template_part('src/svg/logo-atlas-orange'); ?>

        <h2 class="overview__panel-title"><?php echo $title; ?></h2>
    </div>

    <div class="overview__panel-info">
        <div class="overview__panel-copy | copy copy-2 extended">
            <?php echo $copy; ?>
        </div>
    </div>
</section>
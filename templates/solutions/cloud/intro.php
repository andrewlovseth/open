<?php

    $intro = get_field('intro');
    $photo = $intro['photo'];
    $headline = $intro['headline'];
    $copy = $intro['copy'];
    $top_border = $intro['top_border'];

?>

<section class="intro solutions-intro cloud-intro grid">

    <?php if($photo): ?>
        <div class="photo">
            <?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
        </div>
    <?php endif; ?>

    <div class="info">
        <?php if($headline): ?>
            <div class="headline">
                <h2><?php echo $headline; ?></h2>
            </div>
        <?php endif; ?>

        <?php if($copy): ?>
            <div class="copy copy-2 extended secondary-color">
                <?php echo $copy; ?>
            </div>
        <?php endif; ?>
    </div>

    <?php if($top_border): ?>
        <style>
            .cloud-intro .info:before {
                content: '';
                display: block;
                width: 100%;
                height: 8px;
                background: url(<?php echo $top_border['url']; ?>) no-repeat 0 0;
                background-size: cover;
                position: absolute;
                top: -8px;
                left: 0;
            }
        </style>

    <?php endif; ?>

</section>